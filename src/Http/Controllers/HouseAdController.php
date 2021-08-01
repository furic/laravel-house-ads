<?php

namespace Furic\HouseAds\Http\Controllers;

use Furic\HouseAds\Models\HouseAd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class HouseAdController extends Controller
{

    /**
     * Display a listing of the house ad resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(HouseAd::whereDate('start_at', '<=', date('Y-m-d'))->whereDate('end_at', '>=', date('Y-m-d'))->orderBy('priority', 'desc')->get(), 200);
    }

    /**
     * Display the specified house ad resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return response(HouseAd::findOrFail($id), 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => 'No house ad found.'
            ], 400);
        }
    }

    /**
     * Update the specified house ad resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'confirmed' => 'sometimes|required|numeric',
            'shown' => 'sometimes|required|numeric',
        ]);
        if ($validator->fails()) {
            return response([
                'error' => 'Key "confirmed" required.'
            ], 400);
        }

        try {
            $houseAd = HouseAd::findOrFail($id);
            if ($request->has('confirmed')) {
                if ($request->confirmed == '1') {
                    $houseAd->confirmed_count++;
                } else {
                    $houseAd->cancelled_count++;
                }
            }
            if ($request->has('shown')) {
                $houseAd->shown_count++;
            }
            $houseAd->save();
            return response($houseAd, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => 'No house ad found.'
            ], 400);
        }
    }

}
