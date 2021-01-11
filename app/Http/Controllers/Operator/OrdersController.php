<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\User;
use App\Models\model_has_roles;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::all();
        return view('operator.orders.index', compact(['orders']));
    }

    public function createdorders()
    {
        $orders = Orders::where('status', 'created')->get();
        return view('operator.orders.created', compact(['orders']));
    }

    public function processingorders()
    {
        $orders = Orders::where('status', 'new')->get();
        return view('operator.orders.processing', compact(['orders']));
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
        $orders = Orders::Find($id);
        $couriers = model_has_roles::with('couriers')->where('role_id', '4')->get();
        return view('operator.orders.edit', compact(['orders', 'couriers']));
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
        $cur_id = User::where('fio', $request->courier_id)->first();
        $order = Orders::Find($id);
        $order->status = 'new';
        $order->sum = $request->sum;
        $order->courier_id = $cur_id->id;
        $order->save();
        return redirect()->route('createdorders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
    }
    
    public function cancelorders($id)
    {
        $order = Orders::Find($id);
        $order->status = 'cancel';
        $order->save();
        return redirect()->route('processing');
    }

    public function sendorders()
    {
        $orders = Orders::where('status','send')->get();
        return view('operator.orders.send', compact(['orders']));
    }
}
