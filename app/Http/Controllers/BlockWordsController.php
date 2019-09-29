<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Block_word;
use App\Word;

class BlockWordsController extends Controller
{
    public function index(){
        $block_words = Block_word::all();
        return view('admin.block_words.index',['block_words'=>$block_words]);
    }

    public function update_block_words(Request $request){
        $block_words = Block_word::where('id',$request->id)->first();
        $block_words->words = $request->word;
        if($block_words->update()){
            echo "success";
            die();
        }
    }

    public function delete_block_words(Request $request){
        $block_words = Block_word::where('id',$request->id)->first();
        if($block_words->delete()){
            echo json_encode(1);
            die();
        }
    }

    public function add_block_words_form(){
        return view('admin.block_words.add_block_words');
    }

    public function add_block_words_form_submit(Request $request){
        $validateData = $request->validate([
            'block_word'=>'required'
        ]);
        $block_word = new Block_word();
        $block_word->words = $request->block_word;
        if($block_word->save()){
            return redirect()->route('blockwords.index')->with('success_message','Block word added successfully!');
        }
    }

    public function words(){
        $words = Word::all();
        return view('admin.block_words.words',['words'=>$words]);
    }

    public function delete_words(Request $request){
        $word = Word::where('id',$request->id)->first();
        if($word->delete()){
            echo json_encode(1);
            die();
        }
    }

    public function add_word_form(){
        return view('admin.block_words.add_words');
    }

    public function add_word_form_submit(Request $request){
        
        $validateData = $request->validate([
            'type' => 'required',
            'word' => 'required'
        ]);
        $word = new Word();
        $word->type = $request->type;
        $word->word = $request->word;
        if($word->save()){
            return redirect()->route('blockwords.words')->with('success_message','Word added successfully!');
        }
    }
}
