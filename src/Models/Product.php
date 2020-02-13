<?php

namespace Core\Api\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'customer_id'
    ];

    protected $primaryKey = 'issn';
    /**
     * @return Customer
     */
    public function customer()
    {
        return $this->belongsTo('Core\Api\Models\Customer','uuid');
    }
}
