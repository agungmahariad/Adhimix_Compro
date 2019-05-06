<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\tabContent;
use App\Post;

class F_home extends Controller
{
	function index()
	{
		$data['mother'] = content::orderBy('queue','ASC')->where('publish','1')->where('parent',0)->get();
		$data['child']	= content::where('parent','!=',0)->where('publish','1')->get();
		return view('home.dashboard',compact('data'));
	}

	function page($slug)
	{
		$data['mother'] = content::orderBy('queue','ASC')->where('publish','1')->where('parent',0)->get();
		$data['child']	= content::where('parent','!=',0)->where('publish','1')->get();
		$data['menu']	= content::where('slug',$slug)->first();
		$data['tab']	= tabContent::where('idMenu',$data['menu']->idContent)->where('publish','1')->get();
		$data['post']	= post::where('idMenu',$data['menu']->idContent)->where('publish','1')->get();
		return view('content.content',compact('data'));
	}

	function detailArticle($slug)
	{
		$data['mother'] = content::orderBy('queue','ASC')->where('publish','1')->where('parent',0)->get();
		$data['child']	= content::where('parent','!=',0)->where('publish','1')->get();
		$data['article']= post::where('slug',$slug)->first();
		return view('content.detailArticle',compact('data'));	
	}
	function pdf($id)
	{
		$pdf = post::where('idPost',$id)->first();
		return view('pdf.pdfView',compact('pdf'));
	}
}
