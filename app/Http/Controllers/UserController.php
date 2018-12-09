<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
class UserController extends Controller
{

   public function invitation(){
       return view('user.invitation.form');
   }

   public function invitation_send(Request $request){

       $usermail=Crypt::encrypt(Auth::user()->email);
       $validator = Validator::make($request->all(), [
            "email" => "required|email"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

       $data=[
           'email' => $request['email'],
           'title'=>'Hi new referal',
           'content'=>'Please folow the link '.url("/referal_registration/{$usermail}").' for referal regestration'
       ];

       Mail::send('user.invitation.email',$data, function($message)use($data){
          $message->to($data['email'], 'Nicolai')->subject('Hello Kolean how are you?');
       });

      return redirect('/')->with('status', 'Mail sent with succes.');

    }


    public function referal_registration($partner){

        return view('auth.register', compact('partner'));

    }


}
