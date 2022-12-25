<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Rating;
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
            'user_pict' => 'user-pics/08uFqHzodnaZ1f7lxe0ZxEfdwf33ywutXzxmqQio.jpg'
            
        ]);
        User::create([
            'username' => 'grandexhood',
            'email' => 'bia@gmail.com',
            'password' => bcrypt('grande'),
            'user_name' => 'Grande',
            'user_pict' => 'user-pics/AGaJrNDvePGOUWVxFoyAkrf9EPCp3HwhVAaxerGI.jpg'
        ]);
        User::create([
            'username' => 'inasamany',
            'email' => 'inasamany@gmail.com',
            'password' => bcrypt('inasinas'),
            'user_name' => 'Inas Amany',
            'user_pict' => 'user-pics/tcyA5IdKBPHGNgDNeMvkboGZ58chda1sscyge3Ph.jpg'
        ]);
        User::create([
            'username' => 'tiarayaya',
            'email' => 'yaya@gmail.com',
            'password' => bcrypt('yaya123'),
            'user_name' => 'Tiara',
            'user_pict' => 'user-pics/OyBcTCUisIFvYb7ZQxp4rVvjcF1ICurEyNRdvYhC.jpg'
        ]);
        User::create([
            'username' => 'putrinabila',
            'email' => 'putri@gmail.com',
            'password' => bcrypt('bia1234'),
            'user_name' => 'Putri',
            'user_pict' => 'user-pics/i9Q8kf8B67zLgWshy2wz6glwF0NH56p8Kr9kn8MP.jpg'
        ]);

        Category::create(
        [
            'category_name' => 'Novel',
            'category_pict' => '/img/Novel.png',
            'category_slug' => 'novel'
        ]);
        Category::create(
        [
            'category_name' => 'Education',
            'category_pict' => '/img/Education.png',
            'category_slug' => 'education'
        ]);
        Category::create(
        [
            'category_name' => 'Comics',
            'category_pict' => '/img/Comics.png',
            'category_slug' => 'comics'
        ]);
        Category::create(
        [
            'category_name' => 'Technology',
            'category_pict' => '/img/Technology.png',
            'category_slug' => 'technology'
        ]);
        Category::create(
        [
            'category_name' => 'Self Improvement',
            'category_pict' => '/img/Selfimpr.png',
            'category_slug' => 'self-improvement'
        ]);
        Category::create(
        [
            'category_name' => 'Poetry',
            'category_pict' => '/img/Poetry.png',
            'category_slug' => 'poetry'
        ]);
        Category::create(
        [
            'category_name' => 'Others',
            'category_pict' => '/img/Other.png',
            'category_slug' => 'other'
        ]);

        Book::create(
        [
            'book_title' => 'Riwayat Sang Kala',
            'book_pict' => 'book-pics/CNfA2auD81CAlcts1KK8U8FYBG6VsbTtic3E3Xh1.jpg',
            'book_price' => '20000',
            'book_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, iusto eligendi. Nobis expedita maxime quaerat obcaecati laborum porro, voluptas sunt accusantium soluta vitae, architecto, dolore excepturi odio illum natus. Cumque.',
            'book_author' => 'Namiya',
            'book_quantity' => '1',
            'book_pageNum' => '200',
            'book_lang' => 'English',
            'book_publisher' => 'Gramedia',
            'book_publishDate' => '2022-11-01',
            'book_isbn' => '9381738473',
            'category_id' =>'2',
            'user_id' =>'1'
        ]);
        Book::create(
        [
            'book_title' => 'Pinoccio',
            'book_pict' => 'book-pics/uKy0dBcPjCdtIzLAjog7OOqHXWDp4ETGCGKfdOCH.jpg',
            'book_price' => '35000',
            'book_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, iusto eligendi. Nobis expedita maxime quaerat obcaecati laborum porro, voluptas sunt accusantium soluta vitae, architecto, dolore excepturi odio illum natus. Cumque.',
            'book_author' => 'Yook',
            'book_quantity' => '2',
            'book_pageNum' => '230',
            'book_lang' => 'English',
            'book_publisher' => 'Gramedia',
            'book_publishDate' => '2022-11-01',
            'book_isbn' => '3827893993',
            'category_id' =>'3',
            'user_id' =>'1'
        ]);
        Book::create(
        [
            'book_title' => 'Einstein Girl',
            'book_pict' => 'book-pics/mrZIzV9wmxdXR8xPC0NNILdazTQadTtLzNbmF3Ti.jpg',
            'book_price' => '45000',
            'book_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, iusto eligendi. Nobis expedita maxime quaerat obcaecati laborum porro, voluptas sunt accusantium soluta vitae, architecto, dolore excepturi odio illum natus. Cumque.',
            'book_author' => 'Einstein',
            'book_quantity' => '1',
            'book_pageNum' => '300',
            'book_lang' => 'English',
            'book_publisher' => 'Gramedia',
            'book_publishDate' => '2022-11-01',
            'book_isbn' => '9381738473',
            'category_id' =>'1',
            'user_id' =>'1'
        ]);
        Book::create(
        [
            'book_title' => 'Gideon',
            'book_pict' => 'book-pics/UZlT5RF6MkpCwcUVhCTFSnmoDFyQbUg1V1xTqjly.jpg',
            'book_price' => '46000',
            'book_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, iusto eligendi. Nobis expedita maxime quaerat obcaecati laborum porro, voluptas sunt accusantium soluta vitae, architecto, dolore excepturi odio illum natus. Cumque.',
            'book_author' => 'Namiya',
            'book_quantity' => '1',
            'book_pageNum' => '200',
            'book_lang' => 'English',
            'book_publisher' => 'Gramedia',
            'book_publishDate' => '2022-11-01',
            'book_isbn' => '9381738473',
            'category_id' =>'1',
            'user_id' =>'1'
        ]);
        Book::create(
        [
            'book_title' => 'Tak Bersuara',
            'book_pict' => 'book-pics/fY9tPMFguksZEAdwMgOUDPt0dCQW423l34wBhK76.jpg',
            'book_price' => '100000',
            'book_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, iusto eligendi. Nobis expedita maxime quaerat obcaecati laborum porro, voluptas sunt accusantium soluta vitae, architecto, dolore excepturi odio illum natus. Cumque.',
            'book_author' => 'Yook',
            'book_quantity' => '1',
            'book_pageNum' => '200',
            'book_lang' => 'English',
            'book_publisher' => 'Gramedia',
            'book_publishDate' => '2022-11-01',
            'book_isbn' => '9381738473',
            'category_id' =>'4',
            'user_id' =>'1'
        ]);
        Book::create(
        [
            'book_title' => 'Cinta Selamanya',
            'book_pict' => 'book-pics/X93QsbfKVYUv9omhGwIS8w5C4i6pGj2B93v3Wv8x.jpg',
            'book_price' => '25000',
            'book_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, iusto eligendi. Nobis expedita maxime quaerat obcaecati laborum porro, voluptas sunt accusantium soluta vitae, architecto, dolore excepturi odio illum natus. Cumque.',
            'book_author' => 'Fira Basuki',
            'book_quantity' => '1',
            'book_pageNum' => '200',
            'book_lang' => 'Indonesia',
            'book_publisher' => 'Gramedia',
            'book_publishDate' => '2022-11-01',
            'book_isbn' => '9381738473',
            'category_id' =>'1',
            'user_id' =>'2'
        ]);
        Book::create(
        [
            'book_title' => 'Disruption',
            'book_pict' => 'book-pics/LDz0f3h2STZtldDZOICAqyhLgW0JrU9szBqnb1gp.webp',
            'book_price' => '46000',
            'book_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, iusto eligendi. Nobis expedita maxime quaerat obcaecati laborum porro, voluptas sunt accusantium soluta vitae, architecto, dolore excepturi odio illum natus. Cumque.',
            'book_author' => 'Rhenald Kasali',
            'book_quantity' => '1',
            'book_pageNum' => '456',
            'book_lang' => 'English',
            'book_publisher' => 'Gramedia',
            'book_publishDate' => '2022-11-01',
            'book_isbn' => '9381738473',
            'category_id' =>'4',
            'user_id' =>'2'
        ]);

        // rating
        Rating::create(
        [
            'user_id' => '1',
            'ratingNum' => '3',
        ]);
        Rating::create(
        [
            'user_id' => '1',
            'ratingNum' => '5',
        ]);
        Rating::create(
        [
            'user_id' => '1',
            'ratingNum' => '4',
        ]);
        Rating::create(
        [
            'user_id' => '1',
            'ratingNum' => '4',
        ]);
        Rating::create(
        [
            'user_id' => '2',
            'ratingNum' => '5',
        ]);
        Rating::create(
        [
            'user_id' => '2',
            'ratingNum' => '2',
        ]);
        Rating::create(
        [
            'user_id' => '2',
            'ratingNum' => '3',
        ]);
        Rating::create(
        [
            'user_id' => '3',
            'ratingNum' => '3',
        ]);
        Rating::create(
        [
            'user_id' => '3',
            'ratingNum' => '5',
        ]);
        Rating::create(
        [
            'user_id' => '4',
            'ratingNum' => '2',
        ]);
        Rating::create(
        [
            'user_id' => '4',
            'ratingNum' => '3',
        ]);
        Rating::create(
        [
            'user_id' => '5',
            'ratingNum' => '1',
        ]);
        Rating::create(
        [
            'user_id' => '5',
            'ratingNum' => '5',
        ]);
        Rating::create(
        [
            'user_id' => '5',
            'ratingNum' => '5',
        ]);
    }
}
