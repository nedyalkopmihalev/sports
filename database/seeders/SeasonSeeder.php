<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Season;
use App\Models\Tournament;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tournamentModel = new Tournament();
        $tournamentSeriaA = $tournamentModel->getTournamentsByName();
        $tournamentPremierLeague = $tournamentModel->getTournamentsByName('Premier League');

        if (!empty($tournamentSeriaA)) {
            Season::create([
                'season_name' => 'Season First Seria A',
                'tournament_id' => $tournamentSeriaA->id
            ]);
        }

        if (!empty($tournamentPremierLeague)) {
            Season::create([
                'season_name' => 'Season First Premier League',
                'tournament_id' => $tournamentPremierLeague->id
            ]);
        }
    }
}
