<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Coordenador;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller{
    public function getArray(){
        return ['msg' => "Hello do Buenos", 'dias' => "buenos dias"];
    }

    public function CheckAuth(Request $request, User $user){
        $user = User::all();
        foreach ($user as $usr){
            if ($usr['email'] == $request->input('email') and $usr['senha'] == $request->input('senha')){
                return response($this->getUserModel($usr),201);
            }
        }
        return response('Username or Password does not match', 403);
        
    }

    public function getUserModel($usr){
        $aluno =  Aluno::where('Users_cpf', '=', $usr['cpf'])->first();
        $coord = Coordenador::where('Users_cpf', '=', $usr['cpf'])->first();
        $sup = Supervisor::where('Users_cpf', '=', $usr['cpf'])->first();
        if($aluno != null){
            return array('aluno'=>$aluno,'user'=>$usr);
        }elseif($coord != null){
            return array('coord'=>$coord,'user'=>$usr);
        }elseif ($sup != null ){
            return array('sup'=>$sup,'user'=>$usr);
        }else{
            return $usr;
        }
    }
}
