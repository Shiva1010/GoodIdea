<?php

namespace App\Http\Controllers;

use App\People;
use App\Pool;

use Illuminate\Http\Request;

class PoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nullpool = Pool::where('people_name',null)->count();

        $manypool= 10 - $nullpool;

        $usepool = Pool::get();

        return response()->json(['msg'=>'浴池目前使用狀況','pmany'=>$manypool,'date'=>$usepool]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */





    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        
        $p_name=$request['people_name'];
        $pool_name=$request['pool_name'];

        $havepeople =People::where('p_name',$p_name)->value('p_name');

        if ($p_name == $havepeople){

            $usepool=Pool::where('pool_name',$pool_name)->first();
            $nullpool=$usepool->value('people_name');
            
            if ($nullpool == null){
                

                $update =$usepool->update($request->only(['people_name']));

                return response()->json(['people_name'=>$p_name,'msg'=>'使用了浴池','pool'=>$pool_name,'date'=>$update]);
            }

        }

    }


    public function leavepool(Request $request)
    {

        $p_name=$request['people_name'];


        $havepeople =People::where('p_name',$p_name)->value('p_name');

        if ($p_name == $havepeople){

            $usepool=Pool::where('people_name',$p_name)->first();
//            $usep=Pool::where('people_name',$p_name)->first()->value('people_name');
//
//            dd($usep);
//
//
//            if ($usep == $p_name){


                $update =$usepool->update(['people_name' => null]);

                return response()->json(['people_name'=>$p_name,'msg'=>'離開浴池','date'=>$update]);
//            }

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
        return response()->json(['p_name'=>'Keroro','msg'=>'已離開浴池']);
    }
}
