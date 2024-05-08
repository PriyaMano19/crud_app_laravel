<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'contact_num',
        'email_add',
        'password',
        //'profile_image',
    ];

    public function images()
    {
        return $this->hasMany('App\Models\Images', 'user_id'); 
    }
}
