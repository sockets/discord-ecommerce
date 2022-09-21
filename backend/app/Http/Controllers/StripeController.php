<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function createCheckoutLink(Request $request)
    {
        $discord = $request->discord;
        $productId = $request->product;
        if (!isset($discord)) return response()->json(['error' => 'Missing Discord ID'], 400);
        if (!isset($productId)) return response()->json(['error' => 'Missing Product ID'], 400);

        $customer = Customer::where('discord_id', "=", $discord)->first();

        if ($customer == null) return response()->json(['error' => 'Customer Not Found'], 404);

        $product = Product::where("id", "=", $productId)->first();

        if ($product == null) return response()->json(['error' => 'Product Not Found'], 404);
        if ($product->stripe_product == null || $product->stripe_price == null) return response()->json(['error' => 'Product is missing stripe connection'], 400);

        $stripe = new \Stripe\StripeClient(config('stripe.secret'));

        $YOUR_DOMAIN = "http://localhost:8000/";

        $sessionParams = [
            'line_items' => [[
                'price' => $product->stripe_price,
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
            'billing_address_collection' => 'required',
            'success_url' => $YOUR_DOMAIN . "/success?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => $YOUR_DOMAIN . "/cancel",

            'metadata' => [
                'user' => $customer->id,
                'discord' => $customer->discord_id,
                'product' => $product->id
            ],
        ];

        if ($customer->stripe_customer != null) array_push($sessionParams, ['customer' => $customer->stripe_customer, 'customer_update' => ["name" => 'auto', "address" => 'auto']]);

        try {
            $checkoutSession = $stripe->checkout->sessions->create($sessionParams);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return response()->json([
                "error" => "Invalid Stripe Price",
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error creating checkout link",
            ], 400);
        }

        return [
            "status" => "success",
            "checkout_link" => $checkoutSession->url
        ];
    }
}
