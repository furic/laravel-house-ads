<?php

namespace Furic\HouseAds;

use HouseAd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HouseAdController extends Controller
{

    public function index()
    {
        return HouseAd::whereDate('start_at', '<=', date('Y-m-d'))->whereDate('end_at', '>=', date('Y-m-d'))->get();
    }

    public function show($id)
    {
        return HouseAd::findOrFail($id);
    }

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
