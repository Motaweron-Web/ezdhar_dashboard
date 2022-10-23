<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeasibilityStudy extends Model
{
    use HasFactory;

    protected $table = 'feasibilities';

    protected $fillable = [
        'feasibility_type_id',
        'img',
        'project_name',
        'ownership_rate',
        'note',
        'details',
        'show',
        'user_id',
        'created_at',
        'updated_at',

        ];


    public function feastype()
    {
        return $this->belongsTo(FeasibilityType::class,'feasibility_type_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


    public $timestamps = false;

}
