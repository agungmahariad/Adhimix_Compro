<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\content;
use App\post;
use App\tabContent;
use App\divisi;
use App\contact;

class C_divisi extends Controller
{
	function list_divisi()
	{
		$data['divisi']	= divisi::all();
		$data['parentNav']  = content::where('parent',0)->get();
		$data['childNav']   = content::all();

		return view('admin.set-divisi.list-divisi',compact('data'));
	}

	function add_divisi(Request $req)
	{
		$rules   = ['divisi'=>'unique:divisis'];
		$costume = ['divisi.unique'	=>'Divisi telah terdaftar!'];
		$this->validate($req,$rules,$costume);
		divisi::create([
			'divisi'				=> $req->divisi,
		]);
		session::flash('success','divisi berhasil ditambahkan');
		return back();
	}

	function del_divisi($id)
	{
		$data = divisi::where('id_divisi',$id)->delete();
		session::flash('success','Divisi berhasil di Hapus');
		return back();
	}

	function upd_divisi(Request $req,$id)
	{
		$rules   = ['divisi'=>'unique:divisis'];
		$costume = ['divisi.unique'	=>'Divisi telah terdaftar!'];
		$this->validate($req,$rules,$costume);
		divisi::where('id_divisi',$id)->update([
			'divisi'				=> $req->divisi,
		]);
		session::flash('success','divisi berhasil ditambahkan');
		return back();
	}

	function list_contact()
	{
		$data['dataContact'] = contact::get();
		$data['parentNav']  = content::where('parent',0)->get();
		$data['childNav']   = content::all();
		return view('admin.contact.list-contact', compact('data'));
	}

	public function del_messege($id)
	{
		$data = contact::where('id_contact', $id)->delete();
		session::flash('success','Messege berhasil di Hapus');
		return back();
	}

}
