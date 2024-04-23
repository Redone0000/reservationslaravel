<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\RepresentationReservation;

class RepresentationReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        RepresentationReservation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        //Define data
        $representationReservations = [
            [
                'representation_id' => 1, // Assurez-vous que cet ID existe
                'reservation_id' => 1,    // Assurez-vous que cet ID existe
                'price_id' => 1,          // Assurez-vous que cet ID existe
                'quantity' => 2,
            ],
            [
                'representation_id' => 2, // Assurez-vous que cet ID existe
                'reservation_id' => 2,    // Assurez-vous que cet ID existe
                'price_id' => 2,          // Assurez-vous que cet ID existe
                'quantity' => 3,
            ],
        ];
        

        //Insert data in the table
        DB::table('representation_reservation')->insert($representationReservations);
    }
}
