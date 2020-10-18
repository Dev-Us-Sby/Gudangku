<?php
/**
 * Created by PhpStorm.
 * User: Diandraa
 * Date: 2019-03-05
 * Time: 7:41 PM
 */

namespace App\Traits;


use App\Entities\Role;
use App\Http\Traits\AuthorizableLogin;
use App\Entities\User;
use App\Utils\RoleUtil;
use Illuminate\Http\Request;

trait AuthorizableRegister
{
    use AuthorizableLogin;

    protected function validateRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|min:6',
            'password' => 'required|min:8'
        ]);
    }

    protected function existUsername(Request $request)
    {
        return User::where($this->username(), $request->input('username'))->exists();
    }

    protected function proceedRegister(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            $this->username() => $request->input('username'),
            'password' => bcrypt($request->input('password'))
        ]);

        $role = Role::name(RoleUtil::NAME_ADMIN)->first();

        $user->roles()->attach($role);

        return $user;
    }

    protected function sendRegisterResponse(Request $request)
    {
        return trans('auth.register.ok');
    }

    protected function sendFailedRegisterResponse(Request $request, $message)
    {
        return redirect()->back()->with([
            'message' => $message
        ]);
    }

}