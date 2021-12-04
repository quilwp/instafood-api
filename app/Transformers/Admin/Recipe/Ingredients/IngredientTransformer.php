<?php

namespace App\Transformers\Admin\Recipe\Ingredients;

use App\Models\Ingredient;
use League\Fractal\TransformerAbstract;

class IngredientTransformer extends TransformerAbstract
{
    /**
     * @param Ingredient $ingredient
     * @return array
     */
    public function transform(Ingredient $ingredient): array
    {
        return [
            'id'        => (int) $ingredient->id,
            'name'      => (string) $ingredient->name,
            'quantity'  => (int)  $ingredient->pivot->quantity
        ];
    }
}
