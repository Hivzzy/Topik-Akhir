<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use App\Http\Requests\StorePenjualanModelRequest;
use App\Http\Requests\UpdatePenjualanModelRequest;

class PenjualanModelController extends Controller
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
     * @param  \App\Http\Requests\StorePenjualanModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenjualanModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenjualanModel  $penjualanModel
     * @return \Illuminate\Http\Response
     */
    public function show(PenjualanModel $penjualanModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenjualanModel  $penjualanModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PenjualanModel $penjualanModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenjualanModelRequest  $request
     * @param  \App\Models\PenjualanModel  $penjualanModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenjualanModelRequest $request, PenjualanModel $penjualanModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenjualanModel  $penjualanModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenjualanModel $penjualanModel)
    {
        //
    }
}
