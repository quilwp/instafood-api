<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * @var array|\string[][]
     */
    protected array $recipes = [
        [
            'name' => 'Caprese Salad with Pesto Sauce',
            'ingredients' => [['ingredient_id' => 1, 'quantity' => 1], ['ingredient_id' => 2, 'quantity' => 1], ['ingredient_id' => 3, 'quantity' => 2]]
        ],
        [
            'name' => 'Panzenella',
            'ingredients' => [['ingredient_id' => 1, 'quantity' => 1], ['ingredient_id' => 2, 'quantity' => 1], ['ingredient_id' => 3, 'quantity' => 2]]
        ],
        [
            'name' => 'Bruschetta',
            'ingredients' => [['ingredient_id' => 1, 'quantity' => 1], ['ingredient_id' => 2, 'quantity' => 1], ['ingredient_id' => 3, 'quantity' => 2]]
        ],
        [
            'name' => 'Focaccia Bread',
            'ingredients' => [['ingredient_id' => 1, 'quantity' => 1], ['ingredient_id' => 2, 'quantity' => 1], ['ingredient_id' => 3, 'quantity' => 2]]
        ],
        [
            'name' => 'Pasta Carbonara',
            'ingredients' => [['ingredient_id' => 1, 'quantity' => 1], ['ingredient_id' => 2, 'quantity' => 1], ['ingredient_id' => 3, 'quantity' => 2]]
        ],
        [
            'name' => 'Margherita Pizza',
            'ingredients' => [['ingredient_id' => 1, 'quantity' => 1], ['ingredient_id' => 2, 'quantity' => 1], ['ingredient_id' => 3, 'quantity' => 2]]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->recipes as $recipe) {
            $item = Recipe::create([
                'name' => $recipe['name']
            ]);

            $item->ingredients()->sync($recipe['ingredients']);
        }
    }
}
