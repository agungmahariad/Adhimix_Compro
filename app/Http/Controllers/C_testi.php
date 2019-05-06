<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\content;


class C_testi extends Controller
{
	function testi_list()
	{
		$data['parentNav'] 	= content::where('parent',0)->get();
		$data['childNav']	= content::all();

		return view('admin.testimoni.testimoniList',compact('data'));
	}
}
