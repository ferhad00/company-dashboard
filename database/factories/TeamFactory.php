<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Team;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    protected $model=Team::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
              'name'=>$this->faker->unique->randomElement(['Frontend','Backend','Cyber Security','Mobile']),
            'manager_id'=>function(){
                return User::where('isAdmin',0)->inRandomOrder()->first()->id;
            }
        ];
    }
}
