<?php

namespace App\Http\Controllers;

use App\Models\ProductsDetail;
use App\Http\Requests\StoreProductsDetailRequest;
use App\Http\Requests\UpdateProductsDetailRequest;

class ProductsDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreProductsDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductsDetail  $productsDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsDetail $productsDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductsDetail  $productsDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductsDetail $productsDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsDetailRequest  $request
     * @param  \App\Models\ProductsDetail  $productsDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsDetailRequest $request, ProductsDetail $productsDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductsDetail  $productsDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsDetail $productsDetail)
    {
        //
    }
}
