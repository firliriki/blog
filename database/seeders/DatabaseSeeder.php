<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'created_at' => date("Y-m-d h-i-s"),
            'updated_at' => date("Y-m-d h-i-s"),

        ]);

        DB::table('posts')->insert([
            'post_author' => 1,
            'post_title'  => 'Hello Welt!',
            'post_content' => '<p> ini komenn </p>',
            'post_slug' => 'hello-world',
            'post_category' => 1,
            'post_status' => 'publish',
            'created_at' => date("Y-m-d h-i-s"),
            'updated_at' => date("Y-m-d h-i-s"),
        ]);

        DB::table('categories')->insert([
            'category' => 'Uncategorized',
            'slug' => 'uncategorized',
            'description' => 'This is sample of category',
            'created_at' => date("Y-m-d h-i-s"),
            'updated_at' => date("Y-m-d h-i-s"),
        ]);
        DB::table('comments')->insert([
            'comment_post_id' => 1,
            'comment_author' => 'Guest',
            'comment_content' => 'komen troos',
            'comment_approved' => 1,
            'created_at' => date("Y-m-d h-i-s"),
            'updated_at' => date("Y-m-d h-i-s"),
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
