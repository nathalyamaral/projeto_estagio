<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller{
    public function getArray(){
        return ['msg' => "Hello do Buenos", 'dias' => "buenos dias"];
    }
}
