<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customer extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'discord_id',
        'username',
        'stripe_customer',
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
        'total_spent',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, "id", "customer")->get();
    }

    public function total_orders()
    {
        return count($this->hasMany(Order::class, "id", "customer")->get());
    }
}
