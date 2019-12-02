<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'              => 'admin',
            'email'             => 'admin@admin.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'api_token'         => 'PYrQSVayoqCICi2nUblMmxfqWSaRa9OQqkB7LFlTL9JUoVr8DpHCWNXNQlBB',
            'created_at'        => now(),
        ]);
    }
}
