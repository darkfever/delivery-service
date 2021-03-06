<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id = auth()->user()->id;
        $orders = Orders::where('owner_id', $user_id)->whereIn('status', ['new', 'delivered', 'created'])->orderBy('id')->get();
        return view('user.orders.index', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('user.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Orders::create([
            'owner_id' => auth()->user()->id,
            'from' => $request->from,
            'to' => $request->to,
            'preference' => $request->preference,
            'size' => $request->size,
            'weight' => $request->weight,
            'status' => 'created',
            'recipient_contacts' => $request->recipient_contacts,
            'approximate_time' => $request->approximate_time
        ]);
        return redirect()->route('userorders.index');
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
    public function update($id)
    {
        $order = Orders::Find($id);
        $order->status = 'send';
        $order->save();
        return redirect()->route('userorders.index');
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
