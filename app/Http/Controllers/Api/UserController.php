<?php

namespace App\Http\Controllers\Api;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function details(Request $request){
        $user = User::select('id','name','email','phone','city')
                    ->where('id',$request->id)
                    ->first();

        if(!empty($request->fmt)){
            return $user;
        }else {
            return response()->json([
                'user' => $user,
                'message' => 'success',
                'status' => 'TRUE'
            ], 200);
        }
        
    }
}
