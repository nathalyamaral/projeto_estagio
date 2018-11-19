<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    public function getArray(){
        return ['msg' => "Hello do Buenos", 'dias' => "buenos dias"];
    }

    public function CheckAuth(Request $request, User $user){
        $user = User::get();
        foreach ($user as $usr){
            if ($usr['email'] == $request->input('email') and $usr['senha'] == $request->input('senha')){
                return response($usr,201);
            }
        }
        return response('Username or Password does not match', 403);
    }

}
