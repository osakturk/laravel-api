<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $product_code
 * @property string|null $size
 * @property string $brand
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereBrand($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereProductCode($value)
 * @method static Builder|Product whereSize($value)
 * @mixin Eloquent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereUpdatedAt($value)
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'size', 'brand', 'product_code'
    ];

    protected $guarded = [];
}
