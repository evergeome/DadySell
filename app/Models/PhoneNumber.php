<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'phone', 'user_id'];
    protected $hidden = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
