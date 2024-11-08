<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Season;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seasonModel = new Season();
        $seasonSeriaA = $seasonModel->getSeasonByName();
        $seasonPremierLeague = $seasonModel->getSeasonByName('Season First Premier League');

        if (!empty($seasonSeriaA)) {
            Team::create([
                'team_name' => 'AC Milan',
                'season_id' => $seasonSeriaA->id
            ]);

            Team::create([
                'team_name' => 'AC Monza',
                'season_id' => $seasonSeriaA->id
            ]);

            Team::create([
                'team_name' => 'Atalanta',
                'season_id' => $seasonSeriaA->id
            ]);

            Team::create([
                'team_name' => 'Bologna',
                'season_id' => $seasonSeriaA->id
            ]);

            Team::create([
                'team_name' => 'Cagliari',
                'season_id' => $seasonSeriaA->id
            ]);

            Team::create([
                'team_name' => 'Como 1907',
                'season_id' => $seasonSeriaA->id
            ]);

            Team::create([
                'team_name' => 'Empoli',
                'season_id' => $seasonSeriaA->id
            ]);

            Team::create([
                'team_name' => 'Fiorentina',
                'season_id' => $seasonSeriaA->id
            ]);

            Team::create([
                'team_name' => 'Inter Milan',
                'season_id' => $seasonSeriaA->id
            ]);

            Team::create([
                'team_name' => 'Juventus',
                'season_id' => $seasonSeriaA->id
            ]);
        }

        if (!empty($seasonPremierLeague)) {
            Team::create([
                'team_name' => 'Arsenal',
                'season_id' => $seasonPremierLeague->id
            ]);

            Team::create([
                'team_name' => 'Aston Villa',
                'season_id' => $seasonPremierLeague->id
            ]);

            Team::create([
                'team_name' => 'Bournemouth',
                'season_id' => $seasonPremierLeague->id
            ]);

            Team::create([
                'team_name' => 'Chelsea',
                'season_id' => $seasonPremierLeague->id
            ]);

            Team::create([
                'team_name' => 'Everton',
                'season_id' => $seasonPremierLeague->id
            ]);

            Team::create([
                'team_name' => 'Fulham',
                'season_id' => $seasonPremierLeague->id
            ]);

            Team::create([
                'team_name' => 'Leicester City',
                'season_id' => $seasonPremierLeague->id
            ]);

            Team::create([
                'team_name' => 'Liverpool',
                'season_id' => $seasonPremierLeague->id
            ]);

            Team::create([
                'team_name' => 'Manchester City',
                'season_id' => $seasonPremierLeague->id
            ]);

            Team::create([
                'team_name' => 'Manchester United',
                'season_id' => $seasonPremierLeague->id
            ]);
        }
    }
}
