<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Accounts\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Articles\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});

$factory->define(App\Articles\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Articles\Style::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'main_color' => $faker->hexcolor,
        'support_color' => $faker->hexcolor,
        'css' => $faker->word,
    ];
});

$factory->define(App\Articles\Comment::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'status' => '未讀',
        'author' => $faker->name,
        'url' => $faker->url,
        'email' => $faker->safeEmail,
    ];
});

$factory->define(App\Articles\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'frequency' => 0,
    ];
});
$factory->define(App\Accounts\Permission\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});
$factory->define(App\Accounts\Permission\Permission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});
