<?php

namespace App\Http\Controllers;

use App\Models\DiscountType;
use App\Http\Requests\StoreDiscountTypeRequest;
use App\Http\Requests\UpdateDiscountTypeRequest;

class DiscountTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreDiscountTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscountTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiscountType  $discountType
     * @return \Illuminate\Http\Response
     */
    public function show(DiscountType $discountType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiscountType  $discountType
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscountType $discountType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscountTypeRequest  $request
     * @param  \App\Models\DiscountType  $discountType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscountTypeRequest $request, DiscountType $discountType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiscountType  $discountType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscountType $discountType)
    {
        //
    }
}
