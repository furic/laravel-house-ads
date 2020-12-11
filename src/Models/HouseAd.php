<?php

namespace Furic\HouseAds\Models;

use Illuminate\Database\Eloquent\Model;

class HouseAd extends Model
{

    protected $guarded = [];

    protected $hidden = ['confirmed_count', 'cancelled_count', 'created_at', 'updated_at'];

}
