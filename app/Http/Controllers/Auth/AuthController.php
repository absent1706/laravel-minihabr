<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use ThrottlesLogins, AuthenticatesAndRegistersUsers {
      // trick for overriding postRegister method with call of original trait's postRegister method
      AuthenticatesAndRegistersUsers::postRegister as traitPostRegister;
    }


    protected $redirectTo='/articles';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->middleware('remember_return_url', ['only' => ['getLogin', 'getRegister']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->back()->with([
            'flash_message' => 'You have been successfully logged out!',
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended($this->redirectPath())->with([
            'flash_message' => 'You have been successfully logged in!',
            'flash_class'   => 'success'
        ]);
    }

    public function postRegister(Request $request)
    {
        return $this->traitPostRegister($request)->with([
            'flash_message' => 'You have been successfully registered!',
            'flash_class'   => 'success'
        ]);
    }
}
