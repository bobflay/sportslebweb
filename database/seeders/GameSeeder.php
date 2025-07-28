<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Team;
use Carbon\Carbon;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all teams
        $teams = Team::all();
        
        if ($teams->count() < 2) {
            $this->command->error('Need at least 2 teams to create games. Please run TeamSeeder first.');
            return;
        }

        // Game 1: Past game (2 weeks ago) - Finished
        $game1 = Game::create([
            'title' => 'Championship Quarter-Final',
            'date_time' => Carbon::now()->subWeeks(2)->setHour(19)->setMinute(0),
            'location_name' => 'Sports City Arena',
            'location_latitude' => 33.8547,
            'location_longitude' => 35.8623,
            'broadcasted_on' => 'MTV Sports',
            'broadcast_link' => 'https://mtvsports.com/live',
            'description' => 'Exciting quarter-final match in the national championship series.',
            'status' => 'finished',
            'score_json' => [
                'home_team_score' => 92,
                'away_team_score' => 87,
                'quarters' => [
                    ['home' => 24, 'away' => 22],
                    ['home' => 23, 'away' => 25],
                    ['home' => 22, 'away' => 18],
                    ['home' => 23, 'away' => 22]
                ]
            ]
        ]);

        // Attach teams to game 1
        $game1->teams()->attach([
            $teams[0]->id,
            $teams[1]->id
        ]);

        $this->command->info("Created past game: {$game1->title}");

        // Game 2: Past game (3 days ago) - Finished
        $game2 = Game::create([
            'title' => 'Regular Season Match',
            'date_time' => Carbon::now()->subDays(3)->setHour(20)->setMinute(30),
            'location_name' => 'Ghazir Club Court',
            'location_latitude' => 33.9608,
            'location_longitude' => 35.6539,
            'broadcasted_on' => 'OTV',
            'broadcast_link' => null,
            'description' => 'Regular season game between two rival teams.',
            'status' => 'finished',
            'score_json' => [
                'home_team_score' => 78,
                'away_team_score' => 82,
                'quarters' => [
                    ['home' => 18, 'away' => 20],
                    ['home' => 21, 'away' => 19],
                    ['home' => 20, 'away' => 23],
                    ['home' => 19, 'away' => 20]
                ]
            ]
        ]);

        // Attach teams to game 2 (reverse teams)
        $game2->teams()->attach([
            $teams[1]->id,
            $teams[0]->id
        ]);

        $this->command->info("Created past game: {$game2->title}");

        // Game 3: Upcoming game (in 5 days) - Scheduled
        $game3 = Game::create([
            'title' => 'Championship Semi-Final',
            'date_time' => Carbon::now()->addDays(5)->setHour(21)->setMinute(0),
            'location_name' => 'Beirut Sports Complex',
            'location_latitude' => 33.8938,
            'location_longitude' => 35.5018,
            'broadcasted_on' => 'LBCI Sports',
            'broadcast_link' => 'https://lbcisports.com/live-stream',
            'description' => 'Semi-final match to determine who advances to the championship final. This promises to be an intense battle between two top teams.',
            'status' => 'scheduled',
            'score_json' => null
        ]);

        // Attach teams to game 3
        $game3->teams()->attach([
            $teams[0]->id,
            $teams[1]->id
        ]);

        $this->command->info("Created upcoming game: {$game3->title}");

        $this->command->info('Total games created: 3');
    }
}