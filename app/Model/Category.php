<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    


	public function maincategory()
	{
		return $this->belongsTo(Category::class,'parent_id');
	}

	public function subcategory(){
		return $this->hasMany(Category::class,'parent_id');
	}


}
