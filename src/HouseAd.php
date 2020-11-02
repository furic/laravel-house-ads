<?php

namespace Furic\HouseAds;

use Illuminate\Database\Eloquent\Model;

class HouseAd extends Model
{

    protected $fillable = ['game_id', 'image_portrait', 'image_landscape', 'open_url', 'url_ios', 'url_android', 'repeat_count', 'priority', 'start_at', 'end_at', 'confirmed_count', 'cancelled_count'];

    protected $hidden = ['created_at', 'updated_at'];

}
