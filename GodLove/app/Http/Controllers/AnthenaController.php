<?php

namespace App\Http\Controllers;

use App\Athena;
use App\Iterm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AnthenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $AllAnthena=Athena::orderBy('created_at', 'desc')->get();
//        return response()->json(['msg'=>'來自衆人的祈福','allmsg'=>$AllAnthena]);

//        $AllAnthena=Athena::orderBy('created_at', 'desc')->get();
        $item= Athena::with('iterm')->get();
//        $item= Athena::all()->iterm;
//        dd($item);


        return response()->json(['msg'=>'來自衆人的祈福','allmsg'=>$item]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('自己來，第一個 log');
        Log::debug('An informational message.');
        $validate = $request->validate([
            'name' => ['required', 'string'],
            'iterm_id' => ['required']
        ]);

        if($validate) {
            $name = $request['name'];
            $item = $request['iterm_id'];
            $haveitem = Iterm::where('id', $request['iterm_id'])->value('id');


            if ($item == $haveitem) {

                $create = Athena::create([
                    'name' => $name,
                    'iterm_id'=> $item,
            ]);

                return response()->json(['god' => 'Athena 女神，已收到你真誠的祈福','msg' => $create]);

            } else {

                return response()->json(['msg' => '這物品神明不愛，不要亂選']);
            }

        }else{
            return response()->json(['msg'=>'輸入資料錯誤']);
        }


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
