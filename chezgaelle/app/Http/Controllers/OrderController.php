<?php

namespace App\Http\Controllers;

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
        $validation = Order::where('order_status', "En cours de validation")->get();
        $preparation = Order::where('order_status', "En cours de préparation")->get();
        $reception = Order::where('order_status', "Prêt à être réceptionné")->get();
        $done = Order::where('order_status', "Terminé")->get();
        $order_date = Order::orderBy('pickup_date')->get();

        if( \Auth::user()->role == 'Administrateur')
            return view('orders.index')
            ->with('validation', $validation)
            ->with('preparation', $preparation)
            ->with('reception', $reception)
            ->with('done', $done)
            ->with('order_date', $order_date);
        else
            return redirect()->route('index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = OrderLine::where('order_id', $id)->get();
        
        if( \Auth::user()->role == 'Administrateur')
            return view('orders.show')
            ->with('order', $order);
        else
            return redirect()->route('index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $status)
    {
        $order = Order::where('id', $id)->first();
        if($status === "En cours de validation") {
            $order->order_status = "En cours de préparation";
        } elseif ($status === "En cours de validation") {
            $order->order_status = "Prêt à être réceptionné";
        } elseif ($status === "Prêt à être réceptionné") {
            $order->order_status = "Terminé";
        }
        $order->save();

        $validation = Order::where('order_status', "En cours de validation")->get();
        $preparation = Order::where('order_status', "En cours de préparation")->get();
        $reception = Order::where('order_status', "Prêt à être réceptionné")->get();
        $done = Order::where('order_status', "Terminé")->get();
        $order_date = Order::orderBy('pickup_date')->get();

        if( \Auth::user()->role == 'Administrateur')
            return view('orders.index')
            ->with('validation', $validation)
            ->with('preparation', $preparation)
            ->with('reception', $reception)
            ->with('done', $done)
            ->with('order_date', $order_date);
        else
            return redirect()->route('index');
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