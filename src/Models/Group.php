<?php

namespace AndreasElia\Forum;

use AndreasElia\Forum\Discussion;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'color',
    ];

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}
