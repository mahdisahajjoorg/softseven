<?php

namespace App;
use App\Game_level;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function game_levels(){
        return $this->hasMany(Game_level::class);
    }
}
