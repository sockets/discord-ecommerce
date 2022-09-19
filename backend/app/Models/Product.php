<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdersProducts;
use App\Models\Order;
use Carbon\Carbon;

use function PHPSTORM_META\map;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'stripe_product',
        'stripe_price',
        'stock',
        'type'
    ];


    public function order_count()
    {
        return count($this->hasMany(OrdersProducts::class, "id", "product")->get());
    }
    public function months_order_count()
    {
        return count($this->hasMany(OrdersProducts::class, "id", "product")->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get());
    }
    public function total_revenue()
    {
        return count($this->hasManyThrough(
            OrdersProducts::class,
            Order::class,
            'id',
            'id',
        )->get());
    }
}
