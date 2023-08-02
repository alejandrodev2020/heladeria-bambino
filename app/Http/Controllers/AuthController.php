<?php

namespace App\Http\Controllers;
use Session;
use DB;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    } 

    public function login(Request $request){
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

            if($id_rol == 1 ){
                return redirect('/admin')->with(array('data' => $userLogged,'id_rol'=>$id_rol));
            }

            if($id_rol == 2 ){
                return redirect('/production-manager')->with(array('data' => $userLogged,'id_rol'=>$id_rol));
            }

            if($id_rol == 3 ){
                return redirect('/production-assistant')->with(array('data' => $userLogged,'id_rol'=>$id_rol));
            }

            if($id_rol == 4 ){
                return redirect('/secretary')->with(array('data' => $userLogged,'id_rol'=>$id_rol));
            }




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

    public function autenticate(Request $request){
        $id_rol = Session::get('id_rol');
      return view('contenido.autenticate')->with(array(
                'data' => $id_rol
            ));
    }

    protected function validateLogin(Request $request){
        $this->validate($request,[
            'usuario' => 'required|string',
            'password' => 'required|string'
        ]);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
