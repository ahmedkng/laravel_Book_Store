<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $orders = Order::latest()->get();
    return view('admin.orders.all-orders')->withOrders($orders);
    }



    public function show($id)
    {
    $order = Order::findOrFail($id);

    return view('admin.orders.order-details')->withOrder($order);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
    //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    $input = $request->all();
    $order = Order::findOrFail($id);
    $order->update($input);

    return redirect()->back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
    $order = Order::findOrFail($id);
    $order->delete();
    return redirect()->back()->with('alert_message', 'Order deleted successfully');
    }
    }