<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Player;
use Faker\Factory as Faker;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Basketball positions
        $positions = [
            'Point Guard',
            'Shooting Guard',
            'Small Forward',
            'Power Forward',
            'Center',
            'Guard',
            'Forward',
            'Guard/Forward',
            'Forward/Center',
            'Combo Guard'
        ];

        // Get all teams
        $teams = Team::all();

        // If no teams exist, create some sample teams first
        if ($teams->isEmpty()) {
            $sampleTeams = [
                ['name' => 'Lakers', 'city' => 'Los Angeles', 'coach_name' => 'Darvin Ham', 'founded_year' => 1947],
                ['name' => 'Warriors', 'city' => 'Golden State', 'coach_name' => 'Steve Kerr', 'founded_year' => 1946],
                ['name' => 'Celtics', 'city' => 'Boston', 'coach_name' => 'Joe Mazzulla', 'founded_year' => 1946],
                ['name' => 'Heat', 'city' => 'Miami', 'coach_name' => 'Erik Spoelstra', 'founded_year' => 1988],
                ['name' => 'Bulls', 'city' => 'Chicago', 'coach_name' => 'Billy Donovan', 'founded_year' => 1966],
            ];

            foreach ($sampleTeams as $teamData) {
                Team::create($teamData);
            }
            
            $teams = Team::all();
        }

        // Create 10 players for each team
        foreach ($teams as $team) {
            // Delete existing players for this team to avoid duplicates
            $team->players()->delete();
            
            // Track used numbers for this team
            $usedNumbers = [];
            
            for ($i = 1; $i <= 10; $i++) {
                // Generate unique jersey number
                do {
                    $number = $faker->numberBetween(0, 99);
                } while (in_array($number, $usedNumbers));
                
                $usedNumbers[] = $number;
                
                Player::create([
                    'team_id' => $team->id,
                    'first_name' => $faker->firstName('male'),
                    'last_name' => $faker->lastName,
                    'position' => $faker->randomElement($positions),
                    'number' => $number,
                    'date_of_birth' => $faker->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d'),
                    'photo_url' => null, // You can add sample photo URLs if needed
                ]);
            }
            
            $this->command->info("Created 10 players for team: {$team->name}");
        }

        $totalPlayers = Player::count();
        $this->command->info("Total players created: {$totalPlayers}");
    }
}