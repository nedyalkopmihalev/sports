<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tournament;
use App\Models\Sport;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sportModel = new Sport();
        $sport = $sportModel->getSportByName();

        if (!empty($sport)) {
            Tournament::create([
                'tournament_name' => 'Premier League',
                'sport_id' => $sport->id
            ]);

            Tournament::create([
                'tournament_name' => 'Seria A',
                'sport_id' => $sport->id
            ]);
        }
    }
}
