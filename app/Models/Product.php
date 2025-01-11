<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'name',
        'reference',
        'price',
        'quantity',
        'category_id',
        'category_code',
        'type_id',
        'status_id',
        'location',
        'notes',
        'image_url',
    ];

    /**
     * Get the type associated with the product.
     */
    public function type()
    {
        return $this->belongsTo(ProductType::class);
    }

    /**
     * Get the status associated with the product.
     */
    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}