<?php

namespace App\Domains\SecondEntity\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\SecondEntity\Models\Traits\Attribute\SecondentityAttribute;
use App\Domains\SecondEntity\Models\Traits\Method\SecondentityMethod;
use App\Domains\SecondEntity\Models\Traits\Relationship\SecondentityRelationship;
use App\Domains\SecondEntity\Models\Traits\Scope\SecondentityScope;


/**
 * Class Secondentity.
 */
class Secondentity extends Model
{
    use SoftDeletes,
        SecondentityAttribute,
        SecondentityMethod,
        SecondentityRelationship,
        SecondentityScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'secondentities';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "test",        "test2",    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];


    public $timestamps =["create_at","update_at"];

    /**
     * @var array
     */
    protected $dates = [
    "create_at",
    "update_at",
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * @var array
     */
    protected $appends = [

    ];

}