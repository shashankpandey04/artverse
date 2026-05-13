<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Artwork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@artverse.test',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create artists
        $artists = User::factory()->count(5)->create(['role' => 'artist']);

        // Create visitors
        User::factory()->count(10)->create(['role' => 'visitor']);

        // Create sample artworks
        Artwork::factory()->count(24)->create(['user_id' => $artists->first()->id]);
    }
}
