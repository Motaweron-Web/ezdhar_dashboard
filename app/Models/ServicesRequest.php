<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesRequest extends Model
{
    use HasFactory;

    protected $table = 'service_request';

    protected $fillable = [
        'freelancer_id',
        'client_id',
        'price',
        'sub_category_id',
        'details',
        'created_at',
        'updated_at',
    ];

    public function freelancer()
    {
       return $this->belongsTo(Users::class,'freelancer_id','id');
    }

    public function client()
    {
      return  $this->belongsTo(Users::class,'client_id','id');
    }

    public function subCategory()
    {
        return  $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }

}
