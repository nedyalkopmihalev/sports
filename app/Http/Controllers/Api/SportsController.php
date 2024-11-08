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
            $data['sport'] = self::SPORT_NAME;

            $tournaments = $tournamentModel->getTournamentsBySportId($sport->id);

            if (!empty($tournaments)) {
                foreach ($tournaments as $tournamentItem) {
                    $seasons = $seasonModel->getSeasonsByTournamentId($tournamentItem->id);

                    if (!empty($seasons)) {
                        foreach ($seasons as $seasonItem) {
                            $matches = $matchesModel->getMatchesAndResultsBySeasonId($seasonItem->id);

                            if (!empty($matches)) {
                                foreach ($matches as $matchItem) {
                                    $data['tournament'][$tournamentItem->tournament_name]['season'][$seasonItem->season_name]['matches'][$matchItem->match_id][] = $matchItem->team_name;
                                    $data['tournament'][$tournamentItem->tournament_name]['season'][$seasonItem->season_name]['matches'][$matchItem->match_id][] = $matchItem->score;
                                    //$data['tournament'][$tournamentItem->tournament_name]['season'][$seasonItem->season_name]['match_id'][$matchItem->match_id]['score'][] = $matchItem->score;
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
