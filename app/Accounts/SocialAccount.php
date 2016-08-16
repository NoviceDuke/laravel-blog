<?php

namespace App\Accounts;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    /*------------------------------------------------------------------------**
    ** Entity 定義                                                            **
    **------------------------------------------------------------------------*/
    protected $table = 'social_accounts';

    protected $fillable = [
        'user_id',              // forienKey
        'provider_user_id',     // provider提供的user ID
        'provider',             // provider類型，Ex: facebook、github...
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
