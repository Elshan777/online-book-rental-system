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
            'isbn' => '160710315',
            'in_stock' => 13
        ]);

        Book::create([
            'title' => 'The Murder of Roger Ackroyd',
            'authors' => 'Agatha Christie',
            'description' => 'The Murder of Roger Ackroyd is a work of detective fiction by British writer Agatha Christie, first published in June 1926 in the United Kingdom by William Collins, Sons and in the United States by Dodd, Mead and Company. It is the third novel to feature Hercule Poirot as the lead detective.',
            'released_at' => Carbon::create('1926', '01', '01'),
            'pages' => 312,
            'image_url' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQ_GSPt6WQXmrGO17mh01OC5WXMKZY1kHF2uCRlXVgkyLUQQGKG',
            'language_code' => 'en',
            'isbn' => '2323298988',
            'in_stock' => 8
        ]);

        Book::create([
            'title' => 'The Thirteen Problems',
            'authors' => 'Agatha Christie',
            'description' => 'The Thirteen Problems is a short story collection by British writer Agatha Christie, first published in the UK by Collins Crime Club in June 1932 and in the US by Dodd, Mead and Company in 1933 under the title The Tuesday Club Murders',
            'released_at' => Carbon::create('1932', '01', '01'),
            'pages' => 256,
            'image_url' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSQvzcUv-OM8Rq2MrJkVWOa8R8hnOAc1B4AfGZMJMYw0IEffPZj',
            'language_code' => 'en',
            'isbn' => '2323211988',
            'in_stock' => 4
        ]);

        Book::create([
            'title' => 'White Fang',
            'authors' => 'Jack London',
            'description' => 'White Fang is a novel by American author Jack London — and the name of the books eponymous character, a wild wolfdog. First serialized in Outing magazine between May and October 1906, it was published in book form in October 1906',
            'released_at' => Carbon::create('1906', '01', '01'),
            'pages' => 298,
            'image_url' => 'https://m.media-amazon.com/images/I/51Zlm66XqFL.jpg',
            'language_code' => 'en',
            'isbn' => '2323211981',
            'in_stock' => 4
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
