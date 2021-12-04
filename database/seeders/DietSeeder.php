<?php

namespace Database\Seeders;

use App\Models\Diet;
use Illuminate\Database\Seeder;

class DietSeeder extends Seeder
{
    /**
     * @var array|array[]
     */
    protected array $diets = [
        [
            'name' => 'Atkins diet',
            'author_id' => 1
        ],
        [
            'name' => 'The Zone diet',
            'author_id' => 2
        ],
        [
            'name' => 'Ketogenic diet',
            'author_id' => 3
        ],
        [
            'name' => 'Vegetarian diet',
            'author_id' => 4
        ],
        [
            'name' => 'Vegan diet',
            'author_id' => 5
        ],
        [
            'name' => 'Weight Watchers diet',
            'author_id' => 6
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->diets as $diet) {
            Diet::create($diet);
        }
    }
}
