<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
    protected $table = 'crms';

    public function masterCategory()
    {
    	return $this->belongsTo(MasterCategory::class, 'master_category_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function queryType()
    {
    	return $this->belongsTo(QueryType::class, 'query_type_id');
    }
}
