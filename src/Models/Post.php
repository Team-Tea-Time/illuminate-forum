<?php

namespace AndreasElia\Forum;

use AndreasElia\Forum\Discussion;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discussion_id',
        'user_id',
        'type',
        'content',
    ];

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
