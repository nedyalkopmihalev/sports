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
}
