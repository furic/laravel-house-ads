<?php

namespace Furic\HouseAds\Models;

use Illuminate\Database\Eloquent\Model;
use Furic\GameEssentials\Models\Game;

class HouseAd extends Model
{

    protected $guarded = [];

    protected $hidden = ['game_id', 'media_portrait', 'media_landscape', 'confirmed_count', 'cancelled_count', 'start_at', 'end_at', 'created_at', 'updated_at'];

    protected $appends = ['url_media_portrait', 'url_media_landscape', 'game'];

    public function getUrlMediaPortraitAttribute()
    {
        return url('/media/'.$this->media_portrait);
    }

    public function getUrlMediaLandscapeAttribute()
    {
        return url('/media/'.$this->media_landscape);
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
