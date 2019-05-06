<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabContent extends Model
{
	protected $fillable = ['idMenu','headline','activeLink','reportTitle','descReport','publish','createdBy','updatedBy','type','queue'];
}
