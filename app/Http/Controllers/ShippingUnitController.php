<?php

namespace App\Http\Controllers;

use App\Models\ShippingUnit;
use App\Http\Requests\StoreShippingUnitRequest;
use App\Http\Requests\UpdateShippingUnitRequest;

class ShippingUnitController extends Controller
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
     * @param  \App\Http\Requests\StoreShippingUnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShippingUnitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingUnit  $shippingUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingUnit $shippingUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingUnit  $shippingUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingUnit $shippingUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShippingUnitRequest  $request
     * @param  \App\Models\ShippingUnit  $shippingUnit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShippingUnitRequest $request, ShippingUnit $shippingUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingUnit  $shippingUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingUnit $shippingUnit)
    {
        //
    }
}
