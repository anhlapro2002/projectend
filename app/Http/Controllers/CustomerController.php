<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\employee;
use App\Models\Ward;
use App\Models\Province;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Requests\StorecustomerRequest;
use App\Http\Requests\UpdatecustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj = new customer();
        $customer = $obj ->index()->paginate(5);
        return view('customer.index', [
            'customer' => $customer,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wards = (new Ward())->index();
        $dis = (new District())->index();
        $pro = (new Province())->index();
        return view('customer.add', compact('wards', 'dis', 'pro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecustomerRequest $request)
    {
        $customer = new customer();
        $customer->store($request);

    // Redirect back with success message
        return redirect()->route('customer')->with('success', 'customer added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer, Request $request)
    {
        $cusID = $request->id;
        $edit = $customer->edit($cusID);
        $wards = (new Ward())->index();
        $dis = (new District())->index();
        $pro = (new Province())->index();
        return view('customer.edit', compact('edit', 'customer', 'wards', 'dis', 'pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecustomerRequest  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecustomerRequest $request, customer $customer)
    {
        $customer->update($request->all());
        return redirect()->route('customer')->with('success', 'customer added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
    }
}
