<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function hasOne()
    {
        $user = User::with(['phoneNumber' => function ($q) {
            $q->select('code', 'phone', 'user_id');
        }])->find(1);
        //return $user->phoneNumber;
        return response()->json($user);
    }

    public function hasOneReverse()
    {
        $phone = PhoneNumber::with(['user' => function ($q) {
            $q->select('id', 'firstname', 'lastname', 'username', 'email', 'phone');
        }])->find(1);
        //$phone->makeVisible(['user_id']);
        $phone->makeHidden(['id']);
        return response()->json($phone);
    }

    public function hasPhone()
    {
        return $user = User::with('phoneNumber')->whereHas('phoneNumber', function ($q) {
            $q->where('code', '002');
        })->get();
    }

    public function NothavePhone()
    {
        return $user = User::whereDoesntHave('phoneNumber')->get();
    }

    public function hasMany()
    {
        $user = User::with('store')->find(1);
        //return $user->phoneNumber;
        return response()->json($user);
    }
}
