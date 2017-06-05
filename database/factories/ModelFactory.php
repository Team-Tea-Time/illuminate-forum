<?php

use AndreasElia\Models\Discussion;
use AndreasElia\Models\Group;
use AndreasElia\Models\Post;
use App\User;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Discussion::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(6),
        'slug' => $faker->word,
    ];
});

$factory->define(Group::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->word,
        'color' => $faker->hexcolor,
    ];
});

$factory->define(Post::class, function (Faker\Generator $faker) {
    return [
        'discussion_id' => factory(Discussion::class),
        'user_id' => factory(User::class),
        'text' => $faker->text,
    ];
});
