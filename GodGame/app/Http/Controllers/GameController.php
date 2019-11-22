<?php

namespace App\Http\Controllers;

use App\Player;
use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // 提出 end_time 方法一：SOJ 老大可以用 pluck 挑出 end_time 的方法
//        $game_time=Game::orderBy('end_time','desc')->get()->pluck('end_time')->first();

        // 提出 end_time 方法二
        $game_time=Game::orderBy('end_time','desc')->first();
        $game_end=$game_time['end_time'];


//        dd($game_time=Game::orderBy('end_time','desc')->first());

        $game_end_time=Player::where('game_end_time',$game_end)->get();

        return response()->json(['msg'=>'目前遊戲玩家','now_player'=>$game_end_time]);
    }


    public function indextest()
    {

         $player=Player::where('end_time');
        return response()->json(['msg'=>'目前遊戲玩家',['player'=>'kyo']]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
