<?php

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
            'name'              => 'Dillon Constantine',
            'email'             => 'admin@admin.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
    }
}
