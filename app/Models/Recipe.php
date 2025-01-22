<?php

namespace App\Models;

use Database\Factories\RecipeFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    /** @use HasFactory<RecipeFactory> */
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    /**
     * @return BelongsTo<RecipeCategory, $this>
     */
    public function recipeCategory(): BelongsTo
    {
        return $this->belongsTo(RecipeCategory::class);
    }
    // TODO: belongs to user
}
