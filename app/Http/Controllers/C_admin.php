<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\admin;
use App\content;

class C_admin extends Controller
{

    function list_admin()
    {
    	$data['admin']	= admin::all();
        $data['parentNav']  = content::where('parent',0)->get();
        $data['childNav']   = content::all();

    	return view('admin.set-admin.list-admin',compact('data'));
    }

    function add_admin(Request $req)
    {
		$rules   = ['email'=>'unique:admins','photo'=>'image|mimes:jpeg,jpg,png'];
        $costume = ['email.unique'	=>'Email Telah digunakan!','photo.image'=>'File harus berupa Photo','Photo.mimes'=>'Photo harus berekstensi jpg,jpeg,png'];
        $this->validate($req,$rules,$costume);


		$photo	= $req->file('photo');
		$name 	='Admin_'.time().'.'.$photo->getClientOriginalExtension();
		$folder = public_path('backend/dist/img/admin');
		$photo->move($folder,$name);
		admin::create([
        	'type'				=> $req->type,
        	'fullname'			=> $req->fullname,
        	'email'				=> $req->email,
        	'password'			=> md5($req->password),
        	'gender'			=> $req->gender,
        	'photo'				=> $name,
        	'last_login'		=> null,
        ]);
        session::flash('success','Admin berhasil ditambahkan');
		return back();
    }
    function del_admin($id)
    {
    	$data = admin::where('id',$id)->delete();
    	// foreach ($data->get() as $key) {
    	// 	unlik('public/backend/dist/img/admin/'.$key->photo);
    	// }
    	// $data->delete();
    	session::flash('success','Admin Berhasil di Hapus');
    	return back();
    }
}
