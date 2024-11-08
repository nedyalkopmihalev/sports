<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $teamsTable = 'teams';

    /**
     * @param int $seasonId
     * @return \Illuminate\Support\Collection
     */
    public function getTeamsBySeasonId(int $seasonId)
    {
        return DB::table($this->teamsTable)
            ->select('id')
            ->where('season_id', $seasonId)
            ->get();
    }
}
