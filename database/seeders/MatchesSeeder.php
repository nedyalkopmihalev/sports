<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Matches;
use App\Models\Season;

class MatchesSeeder extends Seeder
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
            Matches::create([
                'match_date' => now()->addDays(1),
                'season_id' => $seasonSeriaA->id
            ]);

            Matches::create([
                'match_date' => now()->addDays(1),
                'season_id' => $seasonSeriaA->id
            ]);

            Matches::create([
                'match_date' => now()->addDays(1),
                'season_id' => $seasonSeriaA->id
            ]);

            Matches::create([
                'match_date' => now()->addDays(2),
                'season_id' => $seasonSeriaA->id
            ]);

            Matches::create([
                'match_date' => now()->addDays(2),
                'season_id' => $seasonSeriaA->id
            ]);
        }

        if (!empty($seasonPremierLeague)) {
            Matches::create([
                'match_date' => now()->addDays(1),
                'season_id' => $seasonPremierLeague->id
            ]);

            Matches::create([
                'match_date' => now()->addDays(1),
                'season_id' => $seasonPremierLeague->id
            ]);

            Matches::create([
                'match_date' => now()->addDays(1),
                'season_id' => $seasonPremierLeague->id
            ]);

            Matches::create([
                'match_date' => now()->addDays(2),
                'season_id' => $seasonPremierLeague->id
            ]);

            Matches::create([
                'match_date' => now()->addDays(2),
                'season_id' => $seasonPremierLeague->id
            ]);
        }
    }
}
