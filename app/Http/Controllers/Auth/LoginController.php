<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Traits\AuthorizableLogin;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthorizableLogin;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (!$this->existUsername($request)) {
            return $this->sendFailedLoginResponse($request, trans('auth.login.failed.username'));
        }

        if ($this->attemptLogin($request)) {
            User::query()->where('username', $request->username)->update([
                'last_login' => date('Y-m-d H:i:s', time())
            ]);

            return $this->sendLoginResponse($request);
        }

        $this->attemptLogout();

        return $this->sendFailedLoginResponse($request, trans('auth.login.failed.password'));
    }

    public function logout()
    {
        return $this->attemptLogout();
    }

}
