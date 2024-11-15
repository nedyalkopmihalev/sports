<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\Tournament;
use App\Models\Season;
use App\Models\Matches;
use App\Models\Result;

class SportsController extends Controller
{
    const SPORT_NAME = 'Football';

    public function getMatches()
    {
        $sportModel = new Sport();
        $tournamentModel = new Tournament();
        $seasonModel = new Season();
        $matchesModel = new Matches();
        $resultsModel = new Result();
        $sport = $sportModel->getSportByName();

        $data = [];

        if (!empty($sport)) {
            $data = [
                'id' => $sport->id,
                'name' => $sport->sport_name
            ];

            $tournaments = $tournamentModel->getTournamentsBySportId($sport->id);

            if (!empty($tournaments)) {
                foreach ($tournaments as $tournamentItem) {
                    $seasons = $seasonModel->getSeasonsByTournamentId($tournamentItem->id);
                    $tournament = [
                        'id' => $tournamentItem->id,
                        'tournament_name' => $tournamentItem->tournament_name
                    ];

                    if (!empty($seasons)) {
                        foreach ($seasons as $seasonItem) {
                            $matches = $matchesModel->getMatchesAndResultsBySeasonId($seasonItem->id);
                            $matchesItems = [];

                            if (!empty($matches)) {
                                foreach ($matches as $matchItem) {
                                    $matchesItems[$matchItem->match_id][] = [
                                        'team_name' => $matchItem->team_name,
                                        'score' => $matchItem->score
                                    ];


                                }
                            }

                            $season = [
                                'season_id' => $seasonItem->id,
                                'season_name' => $seasonItem->season_name,
                                'matches' => $matchesItems
                            ];

                            $data['tournament'][] = [
                                'tournament_id' => $tournamentItem->id,
                                'tournament_name' => $tournamentItem->tournament_name,
                                'season' => $season
                            ];
                        }
                    }
                }
            }
        }

        return response()->json(['data' => $data]);
    }
}
