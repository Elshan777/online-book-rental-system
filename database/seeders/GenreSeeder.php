<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genres')->truncate();

        Genre::create([
            'name' => 'Detective',
            'style' => 'dark'
        ]);

        Genre::create([
            'name' => 'Detective',
            'style' => 'info'
        ]);

        Genre::create([
            'name' => 'Mystery',
            'style' => 'secondary'
        ]);

        Genre::create([
            'name' => 'Drama',
            'style' => 'primary'
        ]);

        Genre::create([
            'name' => 'Fantasy',
            'style' => 'succes'
        ]);

        Genre::create([
            'name' => 'Horror',
            'style' => 'danger'
        ]);
    }
}
