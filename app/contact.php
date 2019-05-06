<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $fillable = ['id_contact','firstname','lastname','email','subject','comment'];
}
