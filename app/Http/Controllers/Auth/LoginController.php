<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');        
    }

    protected function credentials(Request $request)
    {
      $login = $request->input($this->username());

      // Comprobar si el input coincide con el formato de E-mail
      $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'correo' : 'username';

      return [
        $field => $login,
        'password' => $request->input('password'),
        'estado' => 1
      ];
    }

    public function username(){
        return 'username';
    }

}
