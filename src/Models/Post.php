<?php namespace TeamTeaTime\Forum\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use TeamTeaTime\Forum\Models\Traits\HasAuthor;
use TeamTeaTime\Forum\Support\Traits\CachesData;

class Post extends BaseModel
{
    use SoftDeletes, HasAuthor, CachesData;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forum_posts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = ['thread_id', 'author_id', 'post_id', 'content'];

	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
    protected $with = ['author'];

    /**
     * Create a new post model instance.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setPerPage(config('forum.preferences.pagination.posts'));
    }

    /**
     * Relationship: Thread.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thread()
    {
        return $this->belongsTo(Thread::class)->withTrashed();
    }

    /**
     * Relationship: Parent post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * Relationship: Child posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Post::class, 'post_id')->withTrashed();
    }

    /**
     * Attribute: First post flag.
     *
     * @return boolean
     */
    public function getIsFirstAttribute()
    {
        return $this->id == $this->thread->firstPost->id;
    }

    /**
     * Attribute: Sequence number in thread.
     *
     * @return int
     */
    public function getSequenceNumberAttribute()
    {
        $self = $this;

        return $this->remember('sequenceNumber', function () use ($self) {
            foreach ($self->thread->posts as $index => $post) {
                if ($post->id == $self->id) {
                    return $index + 1;
                }
            }
        });
    }
}
