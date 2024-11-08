<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Season;
use App\Models\Result;
use App\Models\Matches;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seasonModel = new Season();
        $seasonSeriaA = $seasonModel->getSeasonByName();
        $seasonPremierLeague = $seasonModel->getSeasonByName('Season First Premier League');

        $teamModel = new Team();
        $matchesModel = new Matches();

        if (!empty($seasonSeriaA)) {
            $teams = $teamModel->getTeamsBySeasonId($seasonSeriaA->id);
            $matches = $matchesModel->getMatchesBySeasonId($seasonSeriaA->id);

            $matchesFirstCount = 0;
            $teamFirstCount = 0;

            if (!empty($matches) && !empty($teams)) {
                foreach ($matches as $matchesItem) {
                    if ($matchesFirstCount == 1) break;
                    foreach ($teams as $teamItem) {
                        if ($teamFirstCount == 2) {
                            break;
                        }

                        Result::create([
                            'match_id' => $matchesItem->id,
                            'team_id' => $teamItem->id,
                            'score' => rand(0, 5)
                        ]);
                        $teamFirstCount++;
                    }
                    $matchesFirstCount++;
                }


                $matchesSecondCount = 0;
                $teamSecondCount = 0;

                foreach ($matches as $matchesItem) {
                    if ($matchesSecondCount == 1) {
                        foreach ($teams as $teamItem) {
                            if ($teamSecondCount == 4) {
                                break;
                            }

                            if ($teamSecondCount > 1) {
                                Result::create([
                                    'match_id' => $matchesItem->id,
                                    'team_id' => $teamItem->id,
                                    'score' => rand(0, 5)
                                ]);
                            }
                            $teamSecondCount++;
                        }
                    }
                    $matchesSecondCount++;
                }

                $matchesThirdCount = 0;
                $teamThirdCount = 0;

                foreach ($matches as $matchesItem) {
                    if ($matchesThirdCount == 2) {
                        foreach ($teams as $teamItem) {
                            if ($teamThirdCount == 6) {
                                break;
                            }

                            if ($teamThirdCount > 3) {
                                Result::create([
                                    'match_id' => $matchesItem->id,
                                    'team_id' => $teamItem->id,
                                    'score' => rand(0, 5)
                                ]);
                            }
                            $teamThirdCount++;
                        }
                    }
                    $matchesThirdCount++;
                }

                $matchesFourthCount = 0;
                $teamFourthCount = 0;

                foreach ($matches as $matchesItem) {
                    if ($matchesFourthCount == 3) {
                        foreach ($teams as $teamItem) {
                            if ($teamFourthCount == 8) {
                                break;
                            }

                            if ($teamFourthCount > 5) {
                                Result::create([
                                    'match_id' => $matchesItem->id,
                                    'team_id' => $teamItem->id,
                                    'score' => rand(0, 5)
                                ]);
                            }
                            $teamFourthCount++;
                        }
                    }
                    $matchesFourthCount++;
                }

                $matchesFifthCount = 0;
                $teamFifthCount = 0;

                foreach ($matches as $matchesItem) {
                    if ($matchesFifthCount == 4) {
                        foreach ($teams as $teamItem) {
                            if ($teamFifthCount == 10) {
                                break;
                            }

                            if ($teamFifthCount > 7) {
                                Result::create([
                                    'match_id' => $matchesItem->id,
                                    'team_id' => $teamItem->id,
                                    'score' => rand(0, 5)
                                ]);
                            }
                            $teamFifthCount++;
                        }
                    }
                    $matchesFifthCount++;
                }
            }
        }

        if (!empty($seasonPremierLeague)) {
            $teams = $teamModel->getTeamsBySeasonId($seasonPremierLeague->id);
            $matches = $matchesModel->getMatchesBySeasonId($seasonPremierLeague->id);

            $matchesFirstCount = 0;
            $teamFirstCount = 0;

            if (!empty($matches) && !empty($teams)) {
                foreach ($matches as $matchesItem) {
                    if ($matchesFirstCount == 1) break;
                    foreach ($teams as $teamItem) {
                        if ($teamFirstCount == 2) {
                            break;
                        }

                        Result::create([
                            'match_id' => $matchesItem->id,
                            'team_id' => $teamItem->id,
                            'score' => rand(0, 5)
                        ]);
                        $teamFirstCount++;
                    }
                    $matchesFirstCount++;
                }


                $matchesSecondCount = 0;
                $teamSecondCount = 0;

                foreach ($matches as $matchesItem) {
                    if ($matchesSecondCount == 1) {
                        foreach ($teams as $teamItem) {
                            if ($teamSecondCount == 4) {
                                break;
                            }

                            if ($teamSecondCount > 1) {
                                Result::create([
                                    'match_id' => $matchesItem->id,
                                    'team_id' => $teamItem->id,
                                    'score' => rand(0, 5)
                                ]);
                            }
                            $teamSecondCount++;
                        }
                    }
                    $matchesSecondCount++;
                }

                $matchesThirdCount = 0;
                $teamThirdCount = 0;

                foreach ($matches as $matchesItem) {
                    if ($matchesThirdCount == 2) {
                        foreach ($teams as $teamItem) {
                            if ($teamThirdCount == 6) {
                                break;
                            }

                            if ($teamThirdCount > 3) {
                                Result::create([
                                    'match_id' => $matchesItem->id,
                                    'team_id' => $teamItem->id,
                                    'score' => rand(0, 5)
                                ]);
                            }
                            $teamThirdCount++;
                        }
                    }
                    $matchesThirdCount++;
                }

                $matchesFourthCount = 0;
                $teamFourthCount = 0;

                foreach ($matches as $matchesItem) {
                    if ($matchesFourthCount == 3) {
                        foreach ($teams as $teamItem) {
                            if ($teamFourthCount == 8) {
                                break;
                            }

                            if ($teamFourthCount > 5) {
                                Result::create([
                                    'match_id' => $matchesItem->id,
                                    'team_id' => $teamItem->id,
                                    'score' => rand(0, 5)
                                ]);
                            }
                            $teamFourthCount++;
                        }
                    }
                    $matchesFourthCount++;
                }

                $matchesFifthCount = 0;
                $teamFifthCount = 0;

                foreach ($matches as $matchesItem) {
                    if ($matchesFifthCount == 4) {
                        foreach ($teams as $teamItem) {
                            if ($teamFifthCount == 10) {
                                break;
                            }

                            if ($teamFifthCount > 7) {
                                Result::create([
                                    'match_id' => $matchesItem->id,
                                    'team_id' => $teamItem->id,
                                    'score' => rand(0, 5)
                                ]);
                            }
                            $teamFifthCount++;
                        }
                    }
                    $matchesFifthCount++;
                }
            }
        }
    }
}
