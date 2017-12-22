<?php
namespace Weingut\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_code',
        'product_name',
        'description',
        'price',
        'brand_id',
        'category_id'
    ];

    /**
     * Get the brand that the product belongs to.
     */
    public function brand()
    {
        return $this->belongsTo('Weingut\Models\Brand', 'brand_id');
    }

    /**
     * Get the category that the product belongs to.
     */
    public function category()
    {
        return $this->belongsTo('Weingut\Models\Category', 'category_id');
    }
    
}
