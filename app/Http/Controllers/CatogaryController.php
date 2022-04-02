<?php

namespace App\Http\Controllers;

use App\Models\catogary;
use App\Http\Requests\StorecatogaryRequest;
use App\Http\Requests\UpdatecatogaryRequest;

class CatogaryController extends Controller
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
     * @param  \App\Http\Requests\StorecatogaryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecatogaryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\catogary  $catogary
     * @return \Illuminate\Http\Response
     */
    public function show(catogary $catogary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\catogary  $catogary
     * @return \Illuminate\Http\Response
     */
    public function edit(catogary $catogary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecatogaryRequest  $request
     * @param  \App\Models\catogary  $catogary
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecatogaryRequest $request, catogary $catogary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\catogary  $catogary
     * @return \Illuminate\Http\Response
     */
    public function destroy(catogary $catogary)
    {
        //
    }
}
