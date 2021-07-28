<?php

namespace Furic\HouseAds\Models;

use Illuminate\Database\Eloquent\Model;

class HouseAd extends Model
{

    protected $guarded = [];

    protected $hidden = ['image_portrait', 'image_landscape', 'confirmed_count', 'cancelled_count', 'created_at', 'updated_at'];

    protected $appends = ['url_image_portrait', 'url_image_landscape'];

    public function getUrlImagePortraitAttribute()
    {
        return public_path().'/images/'.$this->image_portrait;
    }

    public function getUrlImageLandscapeAttribute()
    {
        return public_path().'/images/'.$this->image_landscape;
    }

    public function stat()
    {
        return $this->hasOne(HouseAdsStat::class);
    }

}
