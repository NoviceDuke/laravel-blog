<?php

namespace App\Accounts\Permission;

use App\Core\Eloquent;
use App\Accounts\User;

class Role extends Eloquent
{
    /*------------------------------------------------------------------------**
    ** Entity 定義                                                            **
    **------------------------------------------------------------------------*/
    protected $table = 'roles';
    protected $fillable = [
        'name',                   // 權限角色名稱
        'display_name',            // 顯示的名稱
        'description',            // 權限敘述
    ];

    /**
     * 設定多形中介表名稱.
     */
    private $pivot_table = 'role_endowables';

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/
    public function users()
    {
        return $this->morphedByMany(User::class, $pivot_table)->withTimestamps();
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    /*------------------------------------------------------------------------**
    ** 自訂功能函數                                                            **
    **------------------------------------------------------------------------*/

    /**
     * 關聯特定的Permission
     */
    public function attachPermission($permission)
    {
        if(!$this->permissions()->find($permission->id))
            return $this->permissions()->attach($permission);
    }

    /**
     * 解除關聯特定的Permission
     */
    public function detachPermission($permission)
    {
        return $this->permissions()->detach($permission);
    }
}
