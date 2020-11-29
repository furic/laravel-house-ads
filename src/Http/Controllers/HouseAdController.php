<?php

namespace Furic\HouseAds\Http\Controllers;

use HouseAd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HouseAdController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HouseAd::whereDate('start_at', '<=', date('Y-m-d'))->whereDate('end_at', '>=', date('Y-m-d'))->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return HouseAd::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['confirmed' => 'required|numeric']);

        $houseAd = HouseAd::findOrFail($id);

        // A check to prevent hacker to change the level owner
        if ($request->confirmed == '1')
            $houseAd->confirmed_count++;
        else
            $houseAd->cancelled_count++;

        $houseAd->save();

        return $houseAd;
    }

}
