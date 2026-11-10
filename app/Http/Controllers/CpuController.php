<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Http\Requests\StoreCpuRequest;
use App\Http\Requests\UpdateCpuRequest;

class CpuController extends Controller
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
     * @param  \App\Http\Requests\StoreCpuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCpuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cpu  $cpu
     * @return \Illuminate\Http\Response
     */
    public function show(Cpu $cpu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cpu  $cpu
     * @return \Illuminate\Http\Response
     */
    public function edit(Cpu $cpu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCpuRequest  $request
     * @param  \App\Models\Cpu  $cpu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCpuRequest $request, Cpu $cpu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cpu  $cpu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cpu $cpu)
    {
        //
    }
}
