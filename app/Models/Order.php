<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $order_code
 * @property int $product_id
 * @property int $quantity
 * @property string $address
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereAddress($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereOrderCode($value)
 * @method static Builder|Order whereProductId($value)
 * @method static Builder|Order whereQuantity($value)
 * @mixin Eloquent
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserId($value)
 */
class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_code', 'product_id', 'quantity', 'address', 'user_id'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
