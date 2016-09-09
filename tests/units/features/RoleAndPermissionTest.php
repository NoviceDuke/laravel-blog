<?php

namespace Tests\units\features;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Accounts\Permission\Role;
use App\Accounts\Permission\Permission;

/**
 *  測試Role Permission功能.
 */
class RoleAndPermissionTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    // =========================================================================
    // = 各項測試
    // =========================================================================

    /**
     * 測試 建立Role.
     *
     * @group unit
     * @group eloquent
     */
    public function testCanFactoryRole()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $role = factory(Role::class)->create();

        $this->assertNotNull($role->name);
    }

    /**
     * 測試 建立Permission.
     *
     * @group unit
     * @group eloquent
     */
    public function testCanFactoryPermission()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $p = factory(Permission::class)->create();

        $this->assertNotNull($p->name);
    }

    /**
     * 測試 關聯多對多.
     *
     * @group unit
     * @group eloquent
     */
    public function testCanPermissionAttachRole()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $p = factory(Permission::class)->create();
        $role = factory(Role::class)->create();
        $p->attachRole($role);

        $this->assertEquals($p->roles()->first()->name, $role->name);

        //重複賦予部分
        $p->attachRole($role);
        $this->assertEquals($p->roles()->count(), 1);

        //解除部分
        $p->detachRole($role);
        $this->assertNull($p->roles()->first());
    }

    /**
     * 測試 關聯多對多.
     *
     * @group unit
     * @group eloquent
     */
    public function testCanRoleAttachPermission()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $role = factory(Role::class)->create();
        $p = factory(Permission::class)->create();
        $role->attachPermission($p);

        $this->assertEquals($role->permissions()->first()->name, $p->name);

        //重複賦予部分
        $role->attachPermission($p);
        $this->assertEquals($role->permissions()->count(), 1);

        //解除部分
        $role->detachPermission($p);
        $this->assertNull($role->permissions()->first());
    }

    /**
     * 測試 尋找Nmae.
     *
     * @group unit
     * @group eloquent
     */
    public function testCanFindPermissionByName()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $p = factory(Permission::class)->create(['name' => 'testPermission']);

        $target_p = Permission::findName('testPermission');

        $this->assertEquals($p->name, $target_p->name);

    }
}
