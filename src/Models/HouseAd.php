<?php

namespace Furic\HouseAds\Models;

use Illuminate\Database\Eloquent\Model;
use Furic\GameEssentials\Models\Game;

class HouseAd extends Model
{

    protected $guarded = [];

    protected $hidden = ['game_id', 'image_portrait', 'image_landscape', 'confirmed_count', 'cancelled_count', 'start_at', 'end_at', 'created_at', 'updated_at'];

    protected $appends = ['url_image_portrait', 'url_image_landscape', 'game'];

    public function getUrlImagePortraitAttribute()
    {
        return url('/images/'.$this->image_portrait);
    }

    public function getUrlImageLandscapeAttribute()
    {
        return url('/images/'.$this->image_landscape);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function getGameAttribute()
    {
        return $this->game()->first();
    }

}
