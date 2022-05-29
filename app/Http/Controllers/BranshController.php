<?php

namespace App\Http\Controllers;

use App\Models\Bransh;
use App\Http\Requests\StoreBranshRequest;
use App\Http\Requests\UpdateBranshRequest;

class BranshController extends Controller
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
     * @param  \App\Http\Requests\StoreBranshRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranshRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bransh  $bransh
     * @return \Illuminate\Http\Response
     */
    public function show(Bransh $bransh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bransh  $bransh
     * @return \Illuminate\Http\Response
     */
    public function edit(Bransh $bransh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranshRequest  $request
     * @param  \App\Models\Bransh  $bransh
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranshRequest $request, Bransh $bransh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bransh  $bransh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bransh $bransh)
    {
        //
    }
}
