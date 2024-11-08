<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Season extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $seasonsTable = 'seasons';

    /**
     * @param string $seasonName
     * @return Model|null|object|static
     */
    public function getSeasonByName(string $seasonName = 'Season First Seria A')
    {
        return DB::table($this->seasonsTable)
            ->select('id')
            ->where('season_name', $seasonName)
            ->first();
    }
}
