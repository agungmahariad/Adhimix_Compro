<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\content;
use App\post;
use DB;
use App\tabContent;
use App\album;
use App\divisi;


class C_album extends Controller
{
	function list_album($id)
	{

		$data['parentNav'] 	= content::where('parent',0)->get();
		$data['childNav']	= content::all();
		$data['headline']	= tabContent::where('idTab',$id)->first();
		$data['album']  =  DB::table('albums')->where('idTab',$id)
		->join('divisis', 'divisis.id_divisi', '=', 'albums.divisi')
		->select('albums.*', 'divisis.divisi as namadivisi')
		->get();
		$data['divisi'] = divisi::all();
		return view('admin.album.albumList',compact('data'));
	}

	function add_album(Request $req,$id)
	{
		$rules   = ['pict'=>'image|mimes:jpeg,jpg,png'];
		$costume = ['pict.image'=>'File harus berupa Photo','pict.mimes'=>'Photo harus berekstensi jpg,jpeg,png'];
		$this->validate($req,$rules,$costume);
		$photo	= $req->file('pict');
		$name 	='Anabatician_'.time().'.'.$photo->getClientOriginalExtension();
		$folder = public_path('backend/dist/img/album');
		$photo->move($folder,$name);
		album::create([
			'idTab'			=> $id,
			'nama'			=> $req->nama,
			'deskripsi'		=> $req->deskripsi,
			'divisi'		=> $req->id_divisi,
			'pict'			=> $name,
		]);
		session::flash('success','Foto berhasil ditambahkan');
		return back();
	}

	function upd_album(Request $req,$id)
	{
		$old = album::where('id_album',$id)->get();
		if ($req->hasfile('pict')) {
			unlink('public/backend/dist/img/album/' . $old[0]->pict);
			$pict   = $req->file('pict');
			$name   = 'Anabatician_' . time() . '.' . $pict->getClientOriginalExtension();
			$folder = public_path('backend/dist/img/album');
			$pict->move($folder, $name);
			album::where('id_album',$id)->update([
				'nama'			=> $req->nama,
				'deskripsi'		=> $req->deskripsi,
				'divisi'		=> $req->id_divisi,
				'pict'			=> $name,
			]);
			session::flash('success', 'Foto berhasil di update');
			return back();
		} else {
			album::where('id_album',$id)->update([
				'nama'			=> $req->nama,
				'deskripsi'		=> $req->deskripsi,
				'divisi'		=> $req->id_divisi,
			]);
			session::flash('success', 'Foto berhasil di update');
			return back();
		}
	}

	function del_album($id)
	{
		$old = album::where('id_album',$id)->get();
		if (unlink('public/backend/dist/img/album/' . $old[0]->pict)) {
			session::flash('success', 'Foto berhasil di hapus');
			album::where('id_album',$id)->delete();
			return back();
		}
	}
}
