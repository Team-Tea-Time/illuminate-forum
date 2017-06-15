<?php

namespace Bitporch\Forum\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'content',
    ];

    public function discussion()
    {
        return $this->belongsTo('Bitporch\Forum\Models\Discussion');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
