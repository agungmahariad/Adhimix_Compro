<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Content;
use App\tabContent;
use App\Post;
use App\contact;

class Control extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }
    // About

    public function about()
    {
        $data['mother'] = content::orderBy('queue','ASC')->where('publish','1')->where('parent',0)->get();
        $data['child']  = content::where('parent','!=',0)->where('publish','1')->get();
        return view('content.about', compact('data'));
    }

    // Contact

    public function contact()
    {
        $data['mother'] = content::orderBy('queue','ASC')->where('publish','1')->where('parent',0)->get();
        $data['child']  = content::where('parent','!=',0)->where('publish','1')->get();
        return view('content.contact',compact('data'));
    }

    public function addContact(Request $req)
    {
        contact::insert([
            'firstname' => $req->firstname , 'lastname' => $req->lastname ,
            'email'     => $req->email     , 'subject'  => $req->subject ,
            'comment'   => $req->comment
        ]);
        session::flash('success', 'Pesan anda telah dikirim !');
        return back();
    }
}
