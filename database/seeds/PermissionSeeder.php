<?php

use Illuminate\Database\Seeder;
use App\Accounts\Permission\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 初始化權限
        Permission::create([
            'name' => 'BrowseBackend',
            'display_name' => '瀏覽後台',
            'description' => '瀏覽後台(backend)的權限',
        ]);
        Permission::create([
            'name' => 'CreateArticle',
            'display_name' => '創建文章',
            'description' => '於前台創建文章的權限',
        ]);
        Permission::create([
            'name' => 'UpdateArticle',
            'display_name' => '修改與更新文章',
            'description' => '於前台修改與更新文章的權限',
        ]);
        Permission::create([
            'name' => 'DeleteArticle',
            'display_name' => '刪除文章',
            'description' => '於前台刪除文章的權限',
        ]);
    }
}
