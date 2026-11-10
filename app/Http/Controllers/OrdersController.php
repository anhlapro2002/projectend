<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\Products;
use App\Models\customer;
use App\Models\Ward;
use App\Models\Province;
use App\Models\District;
use App\Models\ShippingUnit;
use App\Models\Paymentmethod;
use App\Models\ProductsDetail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreordersRequest;
use App\Http\Requests\UpdateordersRequest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj = new orders();
        $order = $obj ->index()->paginate(8);
        return view('order.index', [
            'order' => $order,
        ]);
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
     * @param  \App\Http\Requests\StoreordersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreordersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(orders $orders, Request $request)
    {
        $orderID = $request->id;
        $edit = $orders->edit($orderID);
        $shippingUnits = (new ShippingUnit())->index();
        $paymentMethods = (new Paymentmethod())->index();
        $customers = (new Customer())->index();
        $products = (new Products())->index(); 
        $wards = (new Ward())->index();
        $dis = (new District())->index();
        $pro = (new Province())->index();
        
        return view('order.edit', compact('edit','paymentMethods', 'shippingUnits', 'customers', 'products', 'wards', 'dis', 'pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateordersRequest  $request
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    // In OrderController.php

    public function update(UpdateordersRequest $request, orders $order)
    {
        
        // Increase the status if it is 0, 1, or 2
        if ($order->Status >= 0 && $order->Status < 3) { 
            $order->setAttribute('Status', $order->Status + 1);
            $order->save();
        }
            
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(orders $orders)
    {
        //
    }
    
}
