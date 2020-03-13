<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'uuid'              => '7aa75ab7-dfe2-3676-b872-38c972e67e09',
            'title'             => 'Aspernatur Nulla Dolore',
            'author'            => 'Natasha Phillips',
            'released'          => '1995-06-24',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        factory(App\Book::class, 99)->create();
    }
}
