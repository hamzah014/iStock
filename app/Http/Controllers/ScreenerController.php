<?php

namespace App\Http\Controllers;

use App\Models\Screener;
use Illuminate\Http\Request;

class ScreenerController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Screener  $screener
     * @return \Illuminate\Http\Response
     */
    public function show(Screener $screener)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Screener  $screener
     * @return \Illuminate\Http\Response
     */
    public function edit(Screener $screener)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Screener  $screener
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screener $screener)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Screener  $screener
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screener $screener)
    {
        //
    }

    public function list()
    {
        return view('screener.view_list');
    }
}
