<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
		$title = Str::title($faker->sentence(5));

    return [
    		'category_id' => rand(1,4),
    		'user_id' => rand(1,3),
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->paragraph(70),
    ];
});
