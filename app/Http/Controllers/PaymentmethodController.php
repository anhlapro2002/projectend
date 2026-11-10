<?php

namespace App\Http\Controllers;

use App\Models\Paymentmethod;
use App\Http\Requests\StorePaymentmethodRequest;
use App\Http\Requests\UpdatePaymentmethodRequest;

class PaymentmethodController extends Controller
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
     * @param  \App\Http\Requests\StorePaymentmethodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentmethodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paymentmethod  $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function show(Paymentmethod $paymentmethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paymentmethod  $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function edit(Paymentmethod $paymentmethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentmethodRequest  $request
     * @param  \App\Models\Paymentmethod  $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentmethodRequest $request, Paymentmethod $paymentmethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paymentmethod  $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paymentmethod $paymentmethod)
    {
        //
    }
}
