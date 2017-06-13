<?php

use AndreasElia\Forum\Models\Discussion;
use AndreasElia\Forum\Models\Group;
use AndreasElia\Forum\Models\Post;

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Discussion::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(6),
        'slug'  => $faker->word,
    ];
});

$factory->define(Group::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->word,
        'slug'  => $faker->word,
        'color' => $faker->hexcolor,
    ];
});

$factory->define(Post::class, function (Faker\Generator $faker) {
    return [
        'discussion_id' => factory(Discussion::class),
        'user_id'       => factory(config('forum.user')),
        'content'       => $faker->text,
    ];
});
