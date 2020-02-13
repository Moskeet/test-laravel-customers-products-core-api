<?php

namespace Core\Api\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "customers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'dateOfBirth',
        'status',
    ];

    protected $primaryKey = 'uuid';
    /**
     * @return Product[]|Collection
     */
    public function products()
    {
        return $this->hasMany('Core\Api\Models\Product');
    }
}
