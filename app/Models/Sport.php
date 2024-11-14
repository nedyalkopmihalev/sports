<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sport extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $sportsTable = 'sports';

    /**
     * @param string $sportName
     * @return Model|null|object|static
     */
    public function getSportByName(string $sportName = 'Football')
    {
        return DB::table($this->sportsTable)
            ->select('id', 'sport_name')
            ->where('sport_name', $sportName)
            ->first();
    }
}
