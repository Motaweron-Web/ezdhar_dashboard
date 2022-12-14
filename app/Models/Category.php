<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table ='categories';

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class,'category_id','id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class,'category_id','id');
    }

}
