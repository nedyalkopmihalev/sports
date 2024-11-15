<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Result extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $resultsTable = 'results';

    /**
     * @var string
     */
    protected $teamsTable = 'teams';

    /**
     * @param int $matchId
     * @return \Illuminate\Support\Collection
     */
    public function getResultsByMatchId(int $matchId)
    {
        return DB::table($this->resultsTable)
            ->select($this->resultsTable . '.id', $this->resultsTable . '.score', $this->teamsTable . '.team_name')
            ->leftJoin($this->teamsTable, $this->teamsTable . '.id', '=', $this->resultsTable . '.team_id')
            ->where($this->resultsTable . '.match_id', $matchId)
            ->get();
    }
}
