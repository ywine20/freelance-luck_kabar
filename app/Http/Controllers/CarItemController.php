<?php

namespace App\Http\Controllers;

use App\Models\CarItem;
use App\Http\Requests\StoreCarItemRequest;
use App\Http\Requests\UpdateCarItemRequest;

class CarItemController extends Controller
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
     * @param  \App\Http\Requests\StoreCarItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Http\Response
     */
    public function show(CarItem $carItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CarItem $carItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarItemRequest  $request
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarItemRequest $request, CarItem $carItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarItem $carItem)
    {
        //
    }
}
