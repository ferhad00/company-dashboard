<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use App\Models\Team_user;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->count(50)->create();
        $teams=Team::factory(4)->create();
        foreach($teams as $team)
        {
            Team_user::factory()->create(['user_id'=>$team->manager_id,'team_id'=>$team->id]);

        }
        $this->call([
        TaskSeeder::class,
        Team_userSeeder::class,
    ]);

    }
}
