<?php

namespace AndreasElia\Forum;

use AndreasElia\Forum\Group;
use AndreasElia\Forum\Post;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'posts_count',
        'participants_count',
        'start_post_id',
        'last_post_id',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
