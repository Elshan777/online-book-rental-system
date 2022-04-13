<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\Book;
use Illuminate\Support\Facades\DB;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->truncate();

        Book::create([
            'title' => 'The Alchemist',
            'authors' => 'Paulo Coelho',
            'description' => 'The Alchemist is a novel by Brazilian author Paulo Coelho which was first published in 1988. Originally written in Portuguese, it became a widely translated international bestseller',
            'released_at' => Carbon::create('1988', '01', '01'),
            'pages' => 198,
            'image_url' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1466865542i/18144590._UY2404_SS2404_.jpg',
            'language_code' => 'es',
            'isbn' => '9780061122415',
            'in_stock' => 33
        ]);
        Book::create([
            'title' => 'Seven Novels',
            'authors' => 'Robert Louis Stevenson',
            'description' => 'He wrote stories of chance and peril, pirates and buried gold. He told tales of good and evil, of men struggling with the darkest parts of their souls.', 
            'released_at' => Carbon::create('1988', '01', '01'),
            'pages' => 198,
            'image_url' => 'https://images-na.ssl-images-amazon.com/images/I/51Vea59qPML._SX313_BO1,204,203,200_.jpg',
            'language_code' => 'en',
            'isbn' => '160710315X',
            'in_stock' => 13
        ]);

        // Book::create([
        //     'title' => 'The Alchemist',
        //     'authors' => 'Paulo Coelho',
        //     'description' => 'The Alchemist is a novel by Brazilian author Paulo Coelho which was first published in 1988. Originally written in Portuguese, it became a widely translated international bestseller',
        //     'released_at' => Carbon::create('1988', '01', '01'),
        //     'pages' => 198,
        //     'image_url' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1466865542i/18144590._UY2404_SS2404_.jpg',
        //     'language_code' => 'es',
        //     'isbn' => '9780061122415',
        //     'in_stock' => 33
        // ]);
    }
}
