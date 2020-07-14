<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function masterCategory()
    {
    	return $this->belongsTo(MasterCategory::class, 'master_category_id');
    }
}
