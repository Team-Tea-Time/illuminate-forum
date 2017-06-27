<?php

namespace Bitporch\Forum\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discussion extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'posts_count',
        'participants_count',
    ];

    /**
     * The attributes that should be casted as a Carbon object.
     *
     * @var array
     */
    protected $dates = [
        'locked_at',
        'stickied_at',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function post()
    {
        return $this->posts->first()->with('user')->first();
    }
}
