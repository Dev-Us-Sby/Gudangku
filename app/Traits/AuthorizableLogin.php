<?php

namespace App\Traits;

use App\Entities\User;
use App\Utils\RoleUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: Diandraa
 * Date: 2019-03-05
 * Time: 6:49 PM
 */
trait AuthorizableLogin
{

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);
    }

    protected function existUsername(Request $request)
    {
        return User::where($this->username(), $request->input($this->username()))->exists();
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::guard()->attempt($request->only([$this->username(), 'password']), false);
    }

    protected function validateAdminRole(Request $request)
    {
        $user = Auth::guard()->user();
        return $user->hasRole(RoleUtil::NAME_ADMIN) || $user->hasRole(RoleUtil::NAME_SUPERADMIN) || $user->hasRole(RoleUtil::NAME_MARKETPLACEADMIN);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        return $this->authenticated($request, Auth::guard()->user());
    }

    protected function sendFailedLoginResponse(Request $request, $message)
    {
        return redirect()->back()->with([
            $this->username() => $request->input($this->username()),
            'message' => $message
        ]);
    }

    // TODO protect for admin only
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }

    protected function username()
    {
        return 'username';
    }

    protected function attemptLogout()
    {
        Auth::logout();
        return redirect()->back();
    }

}
