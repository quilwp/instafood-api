<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * @var array|\string[][]
     */
    protected array $meals = [
        [
            'name' => 'Breakfast'
        ],
        [
            'name' => 'Brunch'
        ],
        [
            'name' => 'Lunch'
        ],
        [
            'name' => 'Dinner'
        ],
        [
            'name' => 'Supper'
        ],
        [
            'name' => 'Snack'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->meals as $meal) {
            Meal::create($meal);
        }
    }
}
