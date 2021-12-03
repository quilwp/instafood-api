<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * @var array|\string[][]
     */
    protected array $ingredients = [
        [
            'name' => 'Apple'
        ],
        [
            'name' => 'Banana'
        ],
        [
            'name' => 'Orange'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}
