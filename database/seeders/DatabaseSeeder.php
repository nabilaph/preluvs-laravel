<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'username' => 'omegari26',
            'email' => 'omegari26@gmail.com',
            'password' => bcrypt('omegari'),
            'user_name' => 'bia',
        ]);

        Category::create(
        [
            'category_id' => 1,
            'category_name' => 'Novel',
            'category_slug' => 'novel'
        ]);
        Category::create(
        [
            'category_id' => 2,
            'category_name' => 'Education',
            'category_slug' => 'education'
        ]);
        Category::create(
        [
            'category_id' => 3,
            'category_name' => 'Comics',
            'category_slug' => 'comics'
        ]);
        Category::create(
        [
            'category_id' => 4,
            'category_name' => 'Technology',
            'category_slug' => 'technology'
        ]);
        Category::create(
        [
            'category_id' => 5,
            'category_name' => 'Self Improvement',
            'category_slug' => 'self-improvement'
        ]);
        Category::create(
        [
            'category_id' => 6,
            'category_name' => 'Poetry',
            'category_slug' => 'poetry'
        ]);
    }
}
