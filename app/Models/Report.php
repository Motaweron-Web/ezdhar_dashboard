<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'order_reports';
//user_id	provider_id	order_id	reason	details	img	created_at	updated_at
    protected $fillable = [
        'user_id',
        'provider_id',
        'order_id',
        'reason',
        'details',
        'img',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class,'user_id','id');
    }

    public function provider()
    {
        return $this->belongsTo(Users::class,'provider_id','id');
    }
}
