<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->user_id = $request->input('user_id');
        $order->total_price =  $request->input('total_price');
        $order->pickup_date = $request->input('pickup_date');
        $order->order_status = $request->input('order_status');
        $order->save();

        $lines = $request->input('lines');
        foreach($lines as $line) {
            $orderline = new OrderLine;
            $orderline->order_id = $order->id;
            $orderline->product_id = $line["product_id"];
            $orderline->quantity = $line["quantity"];
            $orderline->price = $line["price"];
            $orderline->save();  
        }  
        
        return json_encode(array('test'=>'ok'));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::where('user_id', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
