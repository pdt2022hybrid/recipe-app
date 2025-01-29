<?php

use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipe_tag', function (Blueprint $table) {
            $table->foreignIdFor(Tag::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(Recipe::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->primary(['tag_id', 'recipe_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_tag');
    }
};
