<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game_level;
use App\Game;

class GameLevelController extends Controller
{
    public function index(){
        $game_levels = Game_level::with('game')->get();
        return view('admin.game_levels.index',['game_levels'=>$game_levels]);
    }

    public function add_game_level_form(){
        $games = Game::all();
        return view('admin.game_levels.add_game_level',['games'=>$games]);
    }

    public function add_game_level_form_submit(Request $request){
        $validateData = $request->validate([
            'game'=>'required',
            'level'=>'required',
            'low'=>'required',
            'high'=>'required'
        ]);
        $game_level = new Game_level();
        $game_level->game_id = $request->game;
        $game_level->level = $request->level;
        $game_level->low = $request->low;
        $game_level->high = $request->high;
        if($game_level->save()){
            return redirect()->route('game.index')->with('success_message','Game level added successfully!');
        }
    }

    public function edit_game_level(Request $request){
        $id = $request->id;
        $low = $request->low;
        $high = $request->high;
        $game_level = Game_level::where('id',$id)->first();
        $game_level->low = $low;
        $game_level->high = $high;
        if($game_level->update()){
            echo "success";
            die();
        }
    }

    public function delete_game_level(Request $request){
        $game_level = Game_level::where('id',$request->id)->first();
        if($game_level->delete()){
            echo json_encode(1);
            die();
        }
    }
}
