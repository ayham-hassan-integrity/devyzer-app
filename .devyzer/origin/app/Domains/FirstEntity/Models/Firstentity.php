<?php

namespace App\Domains\FirstEntity\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\FirstEntity\Models\Traits\Attribute\FirstentityAttribute;
use App\Domains\FirstEntity\Models\Traits\Method\FirstentityMethod;
use App\Domains\FirstEntity\Models\Traits\Relationship\FirstentityRelationship;
use App\Domains\FirstEntity\Models\Traits\Scope\FirstentityScope;


/**
 * Class Firstentity.
 */
class Firstentity extends Model
{
    use SoftDeletes,
        FirstentityAttribute,
        FirstentityMethod,
        FirstentityRelationship,
        FirstentityScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'firstentities';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "name",        "mobile",    ];

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