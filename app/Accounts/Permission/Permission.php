<?php

namespace App\Accounts\Permission;

use App\Core\Eloquent;
use App\Accounts\Permission\Role;

class Permission extends Eloquent
{

    /*------------------------------------------------------------------------**
    ** Entity 定義                                                            **
    **------------------------------------------------------------------------*/

    protected $table = 'permissions';
    protected $fillable = [
        'name',                   // 權限名稱
        'display_name',            // 顯示的名稱
        'description',            // 權限敘述
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /*------------------------------------------------------------------------**
    ** 自訂功能函數                                                            **
    **------------------------------------------------------------------------*/

    /**
     * 關聯特定的Role
     */
    public function attachRole($role)
    {
        if(!$this->roles()->find($role->id))
            return $this->roles()->attach($role);
    }

    /**
     * 移除關聯特定的Role
     */
    public function detachRole($role)
    {
        return $this->roles()->detach($role);
    }

    /**
     * 透過名稱直接搜尋一個權限
     */
    public static function findName($name)
    {
        $instance = new static;
        return $instance->where('name', $name)->first();
    }
}
