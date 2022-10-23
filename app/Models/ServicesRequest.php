<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesRequest extends Model
{
    use HasFactory;

    protected $table = 'service_requests';


    protected $fillable = [
        'provider_id',
        'user_id',
        'sub_category_id',
        'price',
        'delivery_date',
        'details',
        'room_id',
        'status',
    ];

    public function provider()
    {
       return $this->belongsTo(Users::class,'provider_id','id');
    }

    public function user()
    {
      return  $this->belongsTo(Users::class,'user_id','id');
    }

    public function subcategory()
    {
        return  $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }

}
