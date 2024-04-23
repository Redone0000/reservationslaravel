<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $this->call([
            ArtistSeeder::class,
            TypeSeeder::class,
            ArtistTypeSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            LocalitySeeder::class,
            LocationSeeder::class,
            ShowSeeder::class,
            RepresentationSeeder::class,
            RoleUserSeeder::class,
            ArtistTypeShowSeeder::class,
            ReservationSeeder::class,
            PriceSeeder::class,
            RepresentationReservationSeeder::class,
        ]);

    }
}
