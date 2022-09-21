<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Dotenv\Util\Str;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function handleProviderCallback($provider)
    {
        //Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->stateless()->user();

        if($user = User::where('email',$social_user->email)->first()){
            return $this->authAndRedirect($user);//Login y redireccion
        }else{
            //Añadimos el usuario a la DATABASE
            if($social_user->getName()==null){
                $social_user->name = $social_user->nickname;
            }
            $user = User::create([
                //'token'=>$user->token;
                'name'=>$social_user->getName(),
                'email'=>$social_user->getEmail(),
                'password'=>Hash::make(Str::random(24)),
                'avatar'=>$social_user->avatar,
                'provider'=>$provider
            ]);
            return $this->authAndRedirect($user);//Login y redireccion
        }
    }
    //Login y redireccion
    public function authAndRedirect($user)
    {
        Auth::login($user);
        return redirect($this->redirectTo);
    }
}