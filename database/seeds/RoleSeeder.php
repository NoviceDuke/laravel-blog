<?php

use Illuminate\Database\Seeder;
use App\Accounts\Permission\Role;
use App\Accounts\Permission\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 初始化角色
        Role::create([
            'name' => 'SuperRoot',
            'display_name' => '最高權限角色',
            'description' => '最高權限的角色，如果被賦予這個角色，
                              則能略過權限檢查並操控所有系統功能
                              注意 : 此角色不必賦予任何權限',
        ]);
        $role_super_author = Role::create([
            'name' => 'SuperAuthor',
            'display_name' => '高級作者角色',
            'description' => '透過後台建立的高級作者的角色，如果被賦予這個角色，
                              除了能在前台操控一般功能如:增刪修改文章、Tag、Category等
                              ，也能進入後台進行各個功能的CRUD',
        ]);
        $role_author = Role::create([
            'name' => 'Author',
            'display_name' => '一般作者角色',
            'description' => '正常註冊的一般作者的角色，如果被賦予這個角色，
                              則能在前台操控一般功能如:增刪修改文章、Tag、Category等',
        ]);


        // 腳色賦予各權限
        $role_super_author->attachPermission(Permission::findName('BrowseBackend'));
        $role_super_author->attachPermission(Permission::findName('CreateArticle'));
        $role_super_author->attachPermission(Permission::findName('UpdateArticle'));
        $role_super_author->attachPermission(Permission::findName('DeleteArticle'));


        $role_author->attachPermission(Permission::findName('CreateArticle'));
        $role_author->attachPermission(Permission::findName('UpdateArticle'));
        $role_author->attachPermission(Permission::findName('DeleteArticle'));

    }
}
