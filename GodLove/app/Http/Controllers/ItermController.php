<?php

namespace App\Http\Controllers;

use App\Iterm;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ItermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AllItem = Iterm::orderBy('id')->get();

        return response()->json(['allitem'=>$AllItem]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Create = Iterm::create([
            'item_name' => $request['item_name']
        ]);

        if($Create)
            return response()->json(['msg'=>'物品建立成功','date'=>$Create]);
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
    public function update(Request $request, Iterm $iterm)
    {



            $update =$iterm -> update($request->all());




        if($update)
            return response()->json(['msg'=>'物品更改成功','date'=>$update]);
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
