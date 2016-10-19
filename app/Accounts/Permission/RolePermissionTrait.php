<?php

namespace App\Accounts\Permission;

/**
 * 能夠確認身分及權限.
 */
trait RolePermissionTrait
{
    /**
     * 設定多形中介表名稱.
     */
    private $pivot_table = 'role_endowables';

    public function roles()
    {
        return $this->morphToMany(Role::class, $this->pivot_table)->withTimestamps();
    }

    public function permissions()
    {
        $roles = $this->roles()->get();
        $permissions = collect();
        foreach ($roles as $role) {
            $permissions = $permissions->merge($role->permissions()->get());
        }

        return $permissions->unique('id');
    }

    public function getPermissionsAttribute()
    {
        return $this->permissions();
    }

    /**
     * 關聯特定的Role.
     */
    public function attachRole($role)
    {
        if(!$this->hasRole($role->name))
            return $this->roles()->attach($role);
    }

    /**
     * sync關聯特定的role_ids.
     *
     */
    public function syncRoles($role_ids)
    {
        return $this->roles()->sync($role_ids);
    }

    /**
     * 移除關聯特定的Role.
     */
    public function detachRole($role)
    {
        return $this->roles()->detach($role);
    }

    /**
     *  判定是否擁有某的Role.
     *
     * @return bool
     */
    public function hasRole($role_name)
    {
        if ($this->roles()->where('name', $role_name)->first()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *  判定是否擁有某的Permission.
     *
     * @return bool
     */
    public function hasPermission($permission_name)
    {
        if ($this->permissions()->where('name', $permission_name)->first()) {
            return true;
        } else {
            return false;
        }
    }

    public function isSuperRoot()
    {
        if ($this->roles()->where('name', 'SuperRoot')->first()) {
            return true;
        } else {
            return false;
        }
    }
}
