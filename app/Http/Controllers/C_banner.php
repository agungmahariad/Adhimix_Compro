<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\content;

class C_banner extends Controller
{
	function bannerList()
	{
		$data['parentNav'] 	= content::where('parent',0)->get();
		$data['childNav']	= content::all();

		return view('admin.banner.bannerList',compact('data'));
	}
}
