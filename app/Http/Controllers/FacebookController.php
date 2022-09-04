<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    public function redirect()
    {
    return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id',$user->id)->first();

            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=>$user->id,
                    'password' => encrypt('123456dummy') 
                ]);

                Auth::login($newUser);

                return redirect()->intended('dashboard');
            }
       
        
    }
}
