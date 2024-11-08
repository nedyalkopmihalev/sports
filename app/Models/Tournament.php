<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tournament extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $tournamentsTable = 'tournaments';

    /**
     * @param string $tournamentName
     * @return mixed
     */
    public function getTournamentsByName(string $tournamentName = 'Seria A')
    {
        return DB::table($this->tournamentsTable)
            ->select('id')
            ->where('tournament_name', $tournamentName)
            ->first();
    }
}