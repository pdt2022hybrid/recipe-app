<?php

use App\Models\RecipeCategory;
use App\Models\User;
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
        Schema::create('recipes', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->string('name');
            $table->text('description');
            $table->text('epilogue');

            $table->integer('prep_time');
            $table->integer('portions');

            $table->foreignIdFor(RecipeCategory::class, 'category_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(User::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
