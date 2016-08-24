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

$factory->define(App\User::class, function (Faker\Generator $faker) {
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
        'slug' => str_slug($faker->sentence, '-'),
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
