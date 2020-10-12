<?php

namespace App\Http\Controllers\Api;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //User details API for fetching the data of each user
    public function details(Request $request){
        $user = User::select('id','name','email','phone','city')
                    ->where('id',$request->id)
                    ->first();
        //Validation if the user exists or not
        if(!empty($user)){
            if(!empty($request->fmt)){
                return $user;
            }else {
                return response()->json([
                    'user' => $user,
                    'message' => 'success',
                    'status' => 'TRUE'
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'User does not exist',
                'status' => 'False'
            ], 400);
        }        
    }
}
