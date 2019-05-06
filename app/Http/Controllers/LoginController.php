<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\admin;

class LoginController extends Controller
{
    function loginform()
    {
    	return view('admin.login');
    }
    function logout()
    {
        session::flush();
        return redirect('back');
    }
    function dologin(Request $req)
    {
    	$email 	= $req->email;
    	// $pass	= md5($req->password);

    	$check  = admin::where('email',$email)->where('password',md5($req->password));
    	if ($check->count() > 0) {
    		foreach ($check->get() as $key ) {
    			session::put([
    				'id'				=> $key->id,
    				'type'				=> $key->type,
    				'fullname'			=> $key->fullname,
    				'email'				=> $key->email,
    				'password'			=> $key->password,
    				'gender'			=> $key->gender,
    				'photo'				=> $key->photo,
    				'last_login'		=> $key->last_login,
    				'created_at'		=> $key->created_at,
    				'updated_at'		=> $key->updated_at,

    			]);
    		}
    			return redirect('dashboard');
    	}else{
    		session::flash('error','Username atau password Salah!'.$check->count());
    		return back();
    	}
    }
}
