<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(ArticleSeeder::class);
        $this->call(CommentSeeder::class);

        $this->call(StyleSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
