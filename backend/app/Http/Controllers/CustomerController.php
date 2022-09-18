<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (!isset($data['discord_id'])) return response()->json(['error' => 'Missing Discord ID'], 400);
        if (!isset($data['username'])) return response()->json(['error' => 'Missing Discord Username'], 400);

        $customer = Customer::create([
            'discord_id' => $data['discord_id'],
            'username' => $data['username']
        ]);

        return response()->json([
            "success" => "Customer Created",
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $discord = $request->discord;
        if (!isset($discord)) return response()->json(['error' => 'Missing Discord ID'], 400);

        $customer = Customer::where('discord_id', "=", $discord)->first();

        if ($customer == null) return response()->json(['error' => 'Customer Not Found'], 404);

        return response()->json([
            "customer" => [
                'id' => $customer->id,
                'discord_id' => $customer->discord_id,
                'username' => $customer->username,
                'total_spent' => $customer->total_spent,
            ],
        ], 200);
    }


    public function getCustomerOrders(Request $request)
    {
        $discord = $request->discord;
        if (!isset($discord)) return response()->json(['error' => 'Missing Discord ID'], 400);

        $customer = Customer::where('discord_id', "=", $discord)->first();

        if ($customer == null) return response()->json(['error' => 'Customer Not Found'], 404);

        $orders = $customer->orders();

        return response()->json([
            "customer" => $customer->id,
            "orders" => $orders,
        ], 200);
    }

    public function getCustomerOrder(Request $request)
    {
        $discord = $request->discord;
        $order = $request->order;
        if (!isset($discord)) return response()->json(['error' => 'Missing Discord ID'], 400);
        if (!isset($order)) return response()->json(['error' => 'Missing Order ID'], 400);

        $customer = Customer::where('discord_id', "=", $discord)->first();

        if ($customer == null) return response()->json(['error' => 'Customer Not Found'], 404);

        $orderSearchParamaters = [["customer", "=", $customer->id], ["id", "=", $order]];
        $customerOrder = Order::where($orderSearchParamaters)->first();

        if ($customerOrder == null) return response()->json(['error' => 'Order Not Found'], 404);

        return response()->json([
            "customer" => $customer->id,
            "order" => $customerOrder,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $discord = $request->discord;
        $data = $request->all();
        if (!isset($discord)) return response()->json(['error' => 'Missing Discord ID'], 400);
        if (!isset($data['username'])) return response()->json(['error' => 'Missing Discord Username'], 400);

        $customer = Customer::where('discord_id', "=", $discord)->first();

        if ($customer == null) return response()->json(['error' => 'Customer Not Found'], 404);

        $customer->username = $data['username'];
        $customer->save();

        return response()->json([
            "success" => "Customer Updated",
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
