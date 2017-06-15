<?php

namespace Bitporch\Forum\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->hasMany('Bitporch\Forum\Models\Discussion');
    }
}
