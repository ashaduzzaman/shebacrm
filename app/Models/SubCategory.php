<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    public function Category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function masterCategory()
    {
    	return $this->belongsTo(MasterCategory::class);
    }
}
