<?php

namespace App\Accounts;

use Laravel\Socialite\Contracts\User as ProviderUser;

/**
 * 此服務負責處理Facebook社群帳號與Blog User帳號的聯動邏輯.
 */
class FacebookAccountService
{
    /**
     * 創建Facebook ScocialAccount或取得已存在的Blog User.
     */
    public function createOrGetUser(ProviderUser $providerUser)
    {
        // 在SocailAccount中，取得類型為Facebook且ID符合欄位的資料
        $socialAccount = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        // 已存在此SocailAccount的話，直接回傳對應到的Blog User
        if ($socialAccount) {
            return $socialAccount->user;
        } else {
            return $this->createSocialAccountAndUser($providerUser);
        }
    }

    private function createSocialAccountAndUser(ProviderUser $providerUser)
    {
        $socialAccount = new SocialAccount([
            'provider_user_id' => $providerUser->getId(),
            'provider' => 'facebook',
        ]);

        // 如果搜尋到此Email已存在於Blog User中，則直接取用，沒有就新建
        $user = User::firstOrCreate(['email' => $providerUser->getEmail()]);
        // 沒有名字的時候才需要將名字寫進資料庫，否則保留原名字
        if (empty($user->name)) {
            $user->name = $providerUser->getName();
        }
        $user->save();

        $user->addSocialAccount($socialAccount);

        return $user;
    }
}
