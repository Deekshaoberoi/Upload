<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Upload_Files;
use App\Models\Record;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Upload_Files::factory()
        ->count(10)
        ->has(Record::factory()->count(100), 'records')
        ->create();
    }
}
