<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Backend",
 *      required={"uri", "name", "upstream"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="uri",
 *          description="uri",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="upstream",
 *          description="upstream",
 *          type="string"
 *      )
 * )
 */
class Backend extends Model
{
    use SoftDeletes;

    public $table = 'backends';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'uri',
        'name',
        'description',
        'upstream'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'uri' => 'string',
        'name' => 'string',
        'description' => 'string',
        'upstream' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uri' => 'required',
        'name' => 'required',
        'upstream' => 'required'
    ];
}
