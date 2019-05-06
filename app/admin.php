<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
	protected $fillable=['fullname','type','email','password','gender','photo','last_login'];
}
