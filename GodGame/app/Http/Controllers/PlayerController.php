<?php

namespace App\Http\Controllers;

use App\Game;
use App\Player;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $player=$request['name'];
//        $add_time=$request['add_time']->format('Y-m-d');

//        $add_time=$request['add_time'];
        $add_time= Carbon::now();
        $game_end_time =  Carbon::createFromTimestamp(strtotime($add_time)+15);


        $games = Game::get();
//        $now = Carbon::now();

        foreach($games as $game) {
            $Start_Time = Carbon::parse($game->start_time);
            $End_Time = Carbon::parse($game->end_time);
        }



        if ($add_time < $Start_Time){

            $create_player = Player::create([
                'name' => $player,
                'game_end_time'=>$End_Time
            ]);

            return response()->json(['msg'=>'歡迎進入格鬥天王遊戲','player'=>$create_player,'start_time'=>$Start_Time,'end_time'=>$End_Time]);

        }elseif($add_time > $End_Time){

            $create_player = Player::create([
                'name' => $player,
                'game_end_time'=>$game_end_time
            ]);


            $create_game=Game::create([
                'add_time'=> $add_time,
                'start_time'=> Carbon::createFromTimestamp(strtotime($add_time)+10),
                'end_time'=> Carbon::createFromTimestamp(strtotime($add_time)+15),
            ]);

            return response()->json(['msg'=>'歡迎進入格鬥天王遊戲','player'=>$create_player,'game'=>$create_game]);

        }else{
            return response()->json(['msg'=>'可能有一些問題']);
        }
    }


    public function storecarbon(Request $request)
    {
        $player=$request['name'];
//        $add_time=$request['add_time']->format('Y-m-d');

//        $add_time=$request['add_time'];
        $add_time= Carbon::now();

        $strtotime=Carbon::now()->toDateTimeString();
        dd($strtotime);
        $game_end_time =  Carbon::createFromTimestamp(strtotime($add_time)+15);



        $games = Game::get();


        foreach($games as $game) {
            $Start_Time = Carbon::parse($game->start_time);
            $End_Time = Carbon::parse($game->end_time);
        }



        if ($add_time < $Start_Time){

            $create_player = Player::create([
                'name' => $player,
                'game_end_time'=>$End_Time
            ]);

            return response()->json(['msg'=>'歡迎進入格鬥天王遊戲','player'=>$create_player,'start_time'=>$Start_Time,'end_time'=>$End_Time]);

        }elseif($add_time > $End_Time){

            $create_player = Player::create([
                'name' => $player,
                'game_end_time'=>$game_end_time
            ]);


            $create_game=Game::create([
                'add_time'=> $add_time,
                'start_time'=> Carbon::createFromTimestamp(strtotime($add_time)+10),
                'end_time'=> Carbon::createFromTimestamp(strtotime($add_time)+15),
            ]);
            return response()->json(['msg'=>'歡迎進入格鬥天王遊戲','player'=>$create_player,'game'=>$create_game]);

        }else{
            return response()->json(['msg'=>'可能有一些問題']);
        }
    }







    public function storetest(Request $request)
    {
        $player=$request['name'];
//        $add_time=$request['add_time']->format('Y-m-d');

//        $add_time=$request['add_time'];
        $add_time= Carbon::now();


        $games = Game::get();
//        $now = Carbon::now();

        foreach($games as $game) {
            $Start_Time = Carbon::parse($game->start_time);
            $End_Time = Carbon::parse($game->end_time);
        }


////        $add_time="2019-11-19 08:51:52";
//        $end_date=Game::select('end_time')->orderBy('end_time', 'desc')->first();
//
//        $end_time=$end_date->value('end_time');
//
//
//        $start_date=Game::select('start_time')->orderBy('start_time', 'desc')->first();
//        $start_time=$start_date->value('start_time');


        $create_player = Player::create([
            'name' => $player
        ]);
        if ($add_time < $Start_Time){

            return response()->json(['msg'=>'歡迎進入格鬥天王遊戲','player'=>$create_player,'start_time'=>$Start_Time,'end_time'=>$End_Time]);

        }elseif($add_time > $End_Time){


            $create_game=Game::create([
                'add_time'=> $add_time,
                'start_time'=> Carbon::createFromTimestamp(strtotime($add_time)+10),
                'end_time'=> Carbon::createFromTimestamp(strtotime($add_time)+15),
            ]);
            return response()->json(['msg'=>'歡迎進入格鬥天王遊戲','player'=>$create_player,'game'=>$create_game]);

        }else{
            return response()->json(['msg'=>'可能有一些問題']);
        }



//        return response()->json(['msg'=>'歡迎進入格鬥天王遊戲','player'=>'Kyo','start_time'=>'開始遊戲時間','end_time'=>'遊戲結束時間']);
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
    public function update(Request $request)
    {
//
        $player_id=$request['id'];
        $click=$request['click'];


        $player=Player::where('id',$player_id)->first();

        $update =$player->update(['click' => $click]);



        if($update) {



            $game_end_time=Player::where('id',$player_id)->value('game_end_time');
            $all_game_end_time=Player::where('game_end_time',$game_end_time)->orderBy('click','desc')->get();

            $winner=$all_game_end_time->first();

            return response()->json(['msg' => '比賽結果發表', 'winner' => $winner, 'final' => $all_game_end_time ]);

        }
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
