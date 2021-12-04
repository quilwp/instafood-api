<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property-read int $id
 * @property-read string $name
 * @method forRecipe($id)
 */
class Ingredient extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return BelongsToMany
     */
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class);
    }

    /**
     * @param $query
     * @param int $id
     * @return mixed
     */
    public function scopeForRecipe($query, int $id)
    {
        return $query->whereHas('recipes', function ($query) use ($id) {
            return $query->where('recipes.id', $id);
        });
    }
}
