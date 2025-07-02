<?php

use App\Models\Categories;
use App\Models\CategoryTask;
use App\Models\Task;
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
        Schema::create('category_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Categories::class)->nullable();
            $table->foreignIdFor(Task::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_tasks');
    }
};
