<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    protected $fillable=['idTab','divisi','nama','deskripsi','pict'];
}
