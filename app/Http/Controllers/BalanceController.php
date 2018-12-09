<?php

namespace App\Http\Controllers;

use App\Balance;
use Illuminate\Http\Request;
use App\User;
use App\User_balance;
class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users=User::all()->pluck('name', 'id')->toArray();
        return view('balance.form',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all()->pluck('name', 'id')->toArray();
        return view('balance.form',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $balance_id = Balance::create(['amount'=>$request['amount']])->id;
        $user=User::findOrFail($request['user_id']);
        if($user->partner_id){
            
            $partner_amount=$request['amount']*0.1;
            $referal_amount=$request['amount']-$partner_amount;
            $data = array(
                array('balance_id'=>$balance_id, 'user_id'=> $request['user_id'],'referal_id'=> null ,'amount'=> $referal_amount),
                array('balance_id'=>$balance_id, 'user_id'=> $user->partner_id,'referal_id'=> $request['user_id'],'amount'=> $partner_amount)
            );
            

        }else{
            $data=$request->except(['_token']);
            $data['balance_id']=$balance_id;
        }
        User_balance::insert($data);
        return redirect('/')->with('status', 'Balance was added!');   
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
