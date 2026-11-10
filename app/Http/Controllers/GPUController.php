<?php

namespace App\Http\Controllers;

use App\Models\GPU;
use App\Http\Requests\StoreGPURequest;
use App\Http\Requests\UpdateGPURequest;

class GPUController extends Controller
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
     * @param  \App\Http\Requests\StoreGPURequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGPURequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GPU  $gPU
     * @return \Illuminate\Http\Response
     */
    public function show(GPU $gPU)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GPU  $gPU
     * @return \Illuminate\Http\Response
     */
    public function edit(GPU $gPU)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGPURequest  $request
     * @param  \App\Models\GPU  $gPU
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGPURequest $request, GPU $gPU)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GPU  $gPU
     * @return \Illuminate\Http\Response
     */
    public function destroy(GPU $gPU)
    {
        //
    }
}
