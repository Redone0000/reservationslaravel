<?php 

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Price;

class PriceSeeder extends Seeder
{

    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Price::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $prices = [
            [
                'type' => 'Adult',
                'price' => 20.00,
                'start_date' => Carbon::now()->format('Y-m-d'),
                'end_date' => Carbon::now()->addYear(1)->format('Y-m-d'), 
            ],
            [
                'type' => 'Child',
                'price' => 10.00,
                'start_date' => Carbon::now()->format('Y-m-d'),
                'end_date' => Carbon::now()->addYear(1)->format('Y-m-d'),
            ],
        ];

        DB::table('prices')->insert($prices);
    }
}
