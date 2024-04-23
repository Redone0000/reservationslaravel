<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Reservation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        $reservations = [
            [
                'user_id' => 1,
                'booking_date' => now(),
                'status' => 'confirmé',
            ],
            [
                'user_id' => 2,
                'booking_date' => now()->addDays(5),
                'status' => 'en attente',
            ],
        ];

        DB::table('reservations')->insert($reservations);


    }
}
