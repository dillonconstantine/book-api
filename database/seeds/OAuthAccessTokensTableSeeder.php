<?php

use Illuminate\Database\Seeder;

class OAuthAccessTokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_access_tokens')->insert([
            'id'         => 'ea83bf6c51532c861b443404fc27cb208082d1079af1cd17b9c1037aa4a98d2bdb90193fdec89041',
            'user_id'    => 1,
            'client_id'  => 1,
            'name'       => 'Testing',
            'scopes'     => '[]',
            'revoked'    => 0,
            'created_at' => now(),
            'updated_at' => now(),
            'expires_at' => now()->addYear(),
        ]);
    }
}
