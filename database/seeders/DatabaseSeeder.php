<?php

namespace Database\Seeders;

use App\Models\Book;
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

        Book::create(
        [
            'category_id' => 1,
            'category_name' => 'Novel',
            'category_pict' => '/img/Novel.png',
            'category_slug' => 'novel'
        ]);

        Category::create(
        [
            'category_id' => 1,
            'category_name' => 'Novel',
            'category_pict' => '/img/Novel.png',
            'category_slug' => 'novel'
        ]);
        Category::create(
        [
            'category_id' => 2,
            'category_name' => 'Education',
            'category_pict' => '/img/Education.png',
            'category_slug' => 'education'
        ]);
        Category::create(
        [
            'category_id' => 3,
            'category_name' => 'Comics',
            'category_pict' => '/img/Comics.png',
            'category_slug' => 'comics'
        ]);
        Category::create(
        [
            'category_id' => 4,
            'category_name' => 'Technology',
            'category_pict' => '/img/Technology.png',
            'category_slug' => 'technology'
        ]);
        Category::create(
        [
            'category_id' => 5,
            'category_name' => 'Self Improvement',
            'category_pict' => '/img/Selfimpr.png',
            'category_slug' => 'self-improvement'
        ]);
        Category::create(
        [
            'category_id' => 6,
            'category_name' => 'Poetry',
            'category_pict' => '/img/Poetry.png',
            'category_slug' => 'poetry'
        ]);
    }
}
