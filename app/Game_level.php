<?php

namespace App;
use App\Game;

use Illuminate\Database\Eloquent\Model;

class Game_level extends Model
{
    public $timestamps = false;

    public function game(){
       return $this->belongsTo(Game::class,'game_id');
    }
}
