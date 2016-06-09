<?php namespace TeamTeaTime\Forum\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;
use TeamTeaTime\Forum\Models\Category;
use TeamTeaTime\Forum\Models\Post;
use TeamTeaTime\Forum\Models\Traits\HasAuthor;

class Thread extends BaseModel
{
    use SoftDeletes, HasAuthor;

    /**
     * Eloquent attributes
     */
    protected $table = 'forum_threads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'author_id', 'title', 'locked', 'pinned'];

	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
    protected $with = ['author'];

    /**
     * @var string
     */
    const STATUS_UNREAD = 'unread';

    /**
     * @var string
     */
    const STATUS_UPDATED = 'updated';

    /**
     * Create a new thread model instance.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->perPage = config('forum.preferences.pagination.threads');
    }

    /**
     * Relationship: Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship: Readers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function readers()
    {
        return $this->belongsToMany(
            config('forum.integration.user_model'),
            'forum_threads_read',
            'thread_id',
            'user_id'
        )->withTimestamps();
    }

    /**
     * Relationship: Posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        $withTrashed = config('forum.preferences.display_trashed_posts') || Gate::allows('viewTrashedPosts');
        $query = $this->hasMany(Post::class);
        return $withTrashed ? $query->withTrashed() : $query;
    }

    /**
     * Scope: Recent threads.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeRecent($query)
    {
        $time = time();
        $age = strtotime(config('forum.preferences.old_thread_threshold'), 0);
        $cutoff = $time - $age;

        return $query->where('updated_at', '>', date('Y-m-d H:i:s', $cutoff))->orderBy('updated_at', 'desc');
    }

    /**
     * Attribute: Paginated posts.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPostsPaginatedAttribute()
    {
        return $this->posts()->paginate(config('forum.preferences.pagination.posts'));
    }

    /**
     * Attribute: The last page number of the thread.
     *
     * @return int
     */
    public function getLastPageAttribute()
    {
        return $this->postsPaginated->lastPage();
    }

    /**
     * Attribute: The first post in the thread.
     *
     * @return Post
     */
    public function getFirstPostAttribute()
    {
        return $this->posts()->orderBy('created_at', 'asc')->first();
    }

    /**
     * Attribute: The last post in the thread.
     *
     * @return Post
     */
    public function getLastPostAttribute()
    {
        return $this->posts()->orderBy('created_at', 'desc')->first();
    }

    /**
     * Attribute: Creation time of the last post in the thread.
     *
     * @return \Carbon\Carbon
     */
    public function getLastPostTimeAttribute()
    {
        return $this->lastPost->created_at;
    }

    /**
     * Attribute: Number of thread replies.
     *
     * @return int
     */
    public function getReplyCountAttribute()
    {
        return ($this->posts->count() - 1);
    }

    /**
     * Attribute: 'Old' flag.
     *
     * @return boolean
     */
    public function getOldAttribute()
    {
        $age = config('forum.preferences.old_thread_threshold');
        return (!$age || $this->updated_at->timestamp < (time() - strtotime($age, 0)));
    }

    /**
     * Attribute: Currently authenticated reader.
     *
     * @return mixed
     */
    public function getReaderAttribute()
    {
        if (auth()->check()) {
            $reader = $this->readers()->where('user_id', auth()->user()->getKey())->first();

            return (!is_null($reader)) ? $reader->pivot : null;
        }

        return null;
    }

    /**
     * Attribute: Read/unread/updated status for current reader.
     *
     * @return mixed
     */
    public function getUserReadStatusAttribute()
    {
        if (!$this->old && auth()->check()) {
            if (is_null($this->reader)) {
                return self::STATUS_UNREAD;
            }

            return ($this->updatedSince($this->reader)) ? self::STATUS_UPDATED : false;
        }

        return false;
    }

    /**
     * Helper: Mark this thread as read for the given user ID.
     *
     * @param  int  $userID
     * @return void
     */
    public function markAsRead($userID)
    {
        if (!$this->old) {
            if (is_null($this->reader)) {
                $this->readers()->attach($userID);
            } elseif ($this->updatedSince($this->reader)) {
                $this->reader->touch();
            }
        }

        return $this;
    }
}
