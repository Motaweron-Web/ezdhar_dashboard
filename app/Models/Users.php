<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'id',
        'first_name',
        'phone',
        'image',
        'phone_code',
        'user_type',
        'email',
       'created_at',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class,'user_id','id');
    }

    public function services()
    {
        return $this->hasMany(ServicesRequest::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

}
