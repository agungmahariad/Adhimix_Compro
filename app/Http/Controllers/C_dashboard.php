<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\admin;
use App\content;


class C_dashboard extends Controller
{

    function dash()
    {
    	$data['parentNav'] 	= content::where('parent',0)->get();
		$data['childNav']	= content::all();

    	return view('admin.dashboard.dashboard',compact('data'));
    }

    function meta()
    {
    	
    	return view('admin.meta.meta');
    }
}
