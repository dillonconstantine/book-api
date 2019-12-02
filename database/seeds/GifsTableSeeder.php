<?php

use Illuminate\Database\Seeder;

class GifsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Gif::class, 100)->create();
    }
}
