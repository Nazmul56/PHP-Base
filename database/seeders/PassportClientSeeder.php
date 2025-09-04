<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravel\Passport\Client;

class PassportClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a Password Grant Client
        Client::create([
            'id' => 'password-client',
            'name' => 'Password Grant Client',
            'secret' => 'password-secret',
            'provider' => 'users',
            'redirect_uris' => json_encode(['http://localhost']),
            'grant_types' => json_encode(['password']),
            'revoked' => false,
        ]);

        $this->command->info('Password Grant Client created successfully!');
        $this->command->info('Client ID: password-client');
        $this->command->info('Client Secret: password-secret');
    }
}
