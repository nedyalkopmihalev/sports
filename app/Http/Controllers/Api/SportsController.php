<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\Tournament;
use App\Models\Season;
use App\Models\Matches;

class SportsController extends Controller
{
    const SPORT_NAME = 'Football';

    public function getMatches()
    {
        $sportModel = new Sport();
        $tournamentModel = new Tournament();
        $seasonModel = new Season();
        $matchesModel = new Matches();
        $sport = $sportModel->getSportByName();

        $data = [];

        if (!empty($sport)) {
            $sportResult['id'] = $sport->id;
            $sportResult['name'] = $sport->sport_name;
            $data['sport'][] = $sportResult;

            $tournaments = $tournamentModel->getTournamentsBySportId($sport->id);

            if (!empty($tournaments)) {
                foreach ($tournaments as $tournamentItem) {
                    $seasons = $seasonModel->getSeasonsByTournamentId($tournamentItem->id);

                    if (!empty($seasons)) {
                        foreach ($seasons as $seasonItem) {
                            $matches = $matchesModel->getMatchesAndResultsBySeasonId($seasonItem->id);
                            $data['sport'][$sport->id]['tournament'][$tournamentItem->id]['season']['tournament_id'] = $tournamentItem->id;
                            $data['sport'][$sport->id]['tournament'][$tournamentItem->id]['season']['tournament_name'] = $tournamentItem->tournament_name;
                            $data['sport'][$sport->id]['tournament'][$tournamentItem->id]['season']['id'] = $seasonItem->id;
                            $data['sport'][$sport->id]['tournament'][$tournamentItem->id]['season']['name'] = $seasonItem->season_name;

                            if (!empty($matches)) {
                                foreach ($matches as $matchItem) {
                                    $data['sport'][$sport->id]['tournament'][$tournamentItem->id]['season']['matches'][$matchItem->match_id]['team_name'][] = $matchItem->team_name;
                                    $data['sport'][$sport->id]['tournament'][$tournamentItem->id]['season']['matches'][$matchItem->match_id]['score'][] = $matchItem->score;
                                }
                            }
                        }
                    }
                }
            }
        }

        return response()->json(['data' => $data]);
    }
}
