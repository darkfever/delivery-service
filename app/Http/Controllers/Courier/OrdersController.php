<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\User;
use App\Models\model_has_roles;

class OrdersController extends Controller
{
    public function orders()
    {
        $user_id = auth()->user()->id;
        $orders = Orders::where('courier_id', $user_id)->where('status', 'send')->get();
        return view('courier.orders.index', compact(['orders']));
    }

    public function courierend()
    {
        $user_id = auth()->user()->id;
        $orders = Orders::where('courier_id', $user_id)->where('status', 'delivered')->get();
        return view('courier.orders.delivered', compact(['orders']));
    }
    public function courierupdate($id)
    {
        $order = Orders::Find($id);
        $order->status = 'delivered';
        $order->save();
        return redirect()->route('courier_orders');
    }
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
        //
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
