<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report_details';

    protected $fillable = [
        'user_id',
        'reason',
        'details',
        'image',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class,'user_id','id');
    }
}
