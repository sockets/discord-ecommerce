<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer',
        'billing_email',
        'billing_name',
        'billing_address',
        'billing_city',
        'billing_state',
        'billing_zipcode',
        'billing_country',
        'billing_phone',
        'billing_card_last4',
        'billing_name_on_card',
        'billing_card_type',
        'stripe_customer',
        'stripe_intent',
        'discount',
        'discount_code',
        'subtotal',
        'tax',
        'total',
        'total_paid',
        'payment_gateway',
        'status',
    ];
}
