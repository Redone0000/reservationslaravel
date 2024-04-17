<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Locality;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimez toutes les données existantes dans la table
        
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Locality::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Définissez les données que vous souhaitez insérer dans la table
        $localities = [
            ['locality' => 'Bruxelles-Ville','postal_code' => '1000'],
            ['locality' => 'Schaerbeek', 'postal_code' => '1030'],
            ['locality' => 'Ixelles', 'postal_code' => '1090'],
            ['locality' => 'Saint-Gilles', 'postal_code' => '1060'],
            ['locality' => 'Watermael-Boitsfort', 'postal_code' => '1170'],
        ];

        //Insert data in the table
        DB::table('localities')->insert($localities);

    }
}
