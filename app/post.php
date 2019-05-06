<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
	protected $fillable=['idMenu','idTab','type','title','headline','pdf','reportDate','sortDesc','kontenImage','content','queue','slug','activeLink','publish','createdBy','updatedBy'];
}
