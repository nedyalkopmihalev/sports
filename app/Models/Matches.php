<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Season;

class Matches extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $matchesTable = 'matches';

    /**
     * @var string
     */
    protected $seasonsTable = 'seasons';

    /**
     * @var string
     */
    protected $teamsTable = 'teams';

    /**
     * @var string
     */
    protected $resultsTable = 'results';

    /**
     * @param int $seasonId
     * @return \Illuminate\Support\Collection
     */
    public function getMatchesBySeasonId(int $seasonId)
    {
        return DB::table($this->matchesTable)
            ->select('id')
            ->where('season_id', $seasonId)
            ->get();
    }

    /**
     * @param int $seasonId
     * @return \Illuminate\Support\Collection
     */
    public function getMatchesAndResultsBySeasonId(int $seasonId)
    {
        return DB::table($this->matchesTable)
            ->select($this->matchesTable . '.id as match_id', $this->matchesTable . '.match_date',
                $this->seasonsTable . '.id as season_id', $this->seasonsTable . '.season_name',
                $this->teamsTable . '.team_name', $this->resultsTable . '.score')
            ->leftJoin($this->seasonsTable, $this->seasonsTable . '.id', '=', $this->matchesTable . '.season_id')
            ->leftJoin($this->resultsTable, $this->resultsTable . '.match_id', '=', $this->matchesTable . '.id')
            ->leftJoin($this->teamsTable, $this->teamsTable . '.id', '=', $this->resultsTable . '.team_id')
            ->where($this->matchesTable . '.season_id', $seasonId)
            ->get();
    }
}
