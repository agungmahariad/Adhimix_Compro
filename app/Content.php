<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $fillable=['type','parent','parentName','contentName','banner','title_banner','activeLink','queue','publish','slug','createdBy','updatedBy','created_at','updated_at'];

	function delMenu()
	{
		$menu = Content::all();
		foreach ($menu as $value) {
			if ($value->parent!=='0') {	
				$cek = Content::where('idContent',$value->parent)->count();
				if ($cek==null || $cek == 0 ) {
					Content::where('idContent',$value->idContent)->delete();
				}
			}
		}
	}
}
