<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    //protected $fillable = ['name', 'address', 'created_at', 'updated_at', 'user_id'];
    protected $hidden   = ['created_at', 'updated_at', 'user_id'];
    //public $timestamps  = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
