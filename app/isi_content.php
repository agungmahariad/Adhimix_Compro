<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class isi_content extends Model
{
    protected $fillable = ['idPost','idMenu','title','projek_name','desc','thumbnail'];
}
