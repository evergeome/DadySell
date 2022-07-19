<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($social){
        return Socialite::driver($social)->redirect();
    }

    public function callback($social){
        //return $social;
        $user = Socialite::driver($social)->user();
        return @json_decode(json_encode($user), true);
    }
}
