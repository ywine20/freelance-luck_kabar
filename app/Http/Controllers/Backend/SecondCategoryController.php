<?php

namespace App\Http\Controllers\Backend;

use App\Models\SecondCategory;
use App\Http\Requests\StoreSecondCategoryRequest;
use App\Http\Requests\UpdateSecondCategoryRequest;

class SecondCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreSecondCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSecondCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecondCategory  $secondCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SecondCategory $secondCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SecondCategory  $secondCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondCategory $secondCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSecondCategoryRequest  $request
     * @param  \App\Models\SecondCategory  $secondCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSecondCategoryRequest $request, SecondCategory $secondCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecondCategory  $secondCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondCategory $secondCategory)
    {
        //
    }
}
