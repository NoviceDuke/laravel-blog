<?php

namespace Tests\units\eloquents;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Accounts\Permission\Role;
use App\Accounts\Permission\Permission;
use App\Accounts\User;

/**
 *  測試AuthEloquent 多型多對多 Role功能.
 */
class AuthEloquentAndRoleTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    protected $user;
    protected $role;
    protected $permission;

    /**
     * Setup 測試生命週期setUp時初始化必要資料.
     */
    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create(['name' => 'root']);
        $this->role = factory(Role::class)->create(['name' => 'super']);
        $this->permission = factory(Permission::class)->create(['name' => 'removeRole']);
        $this->role->attachPermission($this->permission);
    }

    // =========================================================================
    // = 各項測試
    // =========================================================================

    /**
     * 測試 關聯User與Role.
     *
     * @group unit
     * @group eloquent
     */
    public function testCanUserAttachRole()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->user->attachRole($this->role);

        $this->assertEquals($this->user->roles()->first()->id, $this->role->id);

        //解除部分
        $this->user->detachRole($this->role);
        $this->assertNull($this->user->roles()->first());
    }

    /**
     * 測試 關聯User是否擁有某些Role.
     *
     * @group unit
     * @group eloquent
     */
    public function testUserHasRole()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->user->attachRole($this->role);
        $this->assertTrue($this->user->hasRole('super'));
        $this->assertFalse($this->user->hasRole('super123456'));
    }

    /**
     * 測試 關聯User是否為超級使用者.
     *
     * @group unit
     * @group eloquent
     */
    public function testUserIsSuperRoot()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->role = factory(Role::class)->create(['name' => 'SuperRoot']);
        $this->user->attachRole($this->role);
        $this->assertTrue($this->user->isSuperRoot());
    }

    /**
     * 測試 關聯User是否擁有某些Permission.
     *
     * @group unit
     * @group eloquent
     */
    public function testUserHasPermission()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->user->attachRole($this->role);

        $this->assertTrue($this->user->hasPermission('removeRole'));
        $this->assertFalse($this->user->hasPermission('removeRole2'));

        $new_p = factory(Permission::class)->create(['name'=>'removeRole2']);
        $this->role->attachPermission($new_p);
        $this->assertTrue($this->user->hasPermission('removeRole2'));
    }
}
