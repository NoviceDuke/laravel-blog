<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Accounts\User;
use Validator;
use App\Http\Controllers\Controller;
use Socialite;
use App\Accounts\FacebookAccountService;

class AuthController extends Controller
{
    /*------------------------------------------------------------------------**
    ** Facebook                                                               **
    **------------------------------------------------------------------------*/

    /**
     * 藉由路由進入此function.
     * 第一次重導 : 重導路由至Facebook並取得帳戶資料
     * 第二次重導至config/services.php 內的Facebook $redirect位置.
     *
     * @param array $data
     *
     * @return User
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookProviderCallback(FacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        Auth::login($user);
        // dd($user);

        return redirect($this->redirectTo);
    }
}
