<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    } 

    public function login(Request $request){
        dd($request);
        $this->validateLogin($request);        

       $userLogged = DB::table('usuario')
                        ->where('email','=', $request->usuario)
                        ->where('pasword','=', $request->password)
                        ->get();
       if ( count($userLogged)> 0){
            // return view('contenido.autenticate')->with(array(
            //     'data' => $userLogged
            // ));
            $id_rol =$userLogged[0]->id_rol;
            return redirect('/main')->with(array('data' => $userLogged,'id_rol'=>$id_rol));
        }
        else{
            return back()
            ->withErrors(['usuario' => trans('auth.failed')])
            ->withInput(request(['usuario']));
        }

        return back()
        ->withErrors(['usuario' => trans('auth.failed')])
        ->withInput(request(['usuario']));

    }
}
