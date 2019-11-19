<?php

namespace App\Http\Controllers;

use App\Buylog;
use App\People;
use App\Drink;
use Illuminate\Http\Request;

class BuylogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Buylog = Buylog::orderBy('id')->get();
        return response()->json(['msg'=>$Buylog]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p_name=$request['p_name'];
        $d_name=$request['d_name'];

        $havepeople =People::where('p_name',$p_name)->value('p_name');
        if($p_name == $havepeople){
        $havedrink = Drink::where('d_name', $d_name)->value('d_name');

            if($d_name == $havedrink) {

                $buydrink = Buylog::create([
                    'people_name' => $p_name,
                    'drink_name' => $d_name,
                ]);

                return response()->json(['p_name' => $p_name, 'msg' => '已購買飲料', 'drink' => $d_name,'date'=>$buydrink]);
            }

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
