<?php

use App\Services\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\FormBuilder\Models\FormBuilder;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(FormBuilder::getDb(), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('listener')->nullable();
            $table->boolean('is_modal')->default(false);
            $table->boolean('status')->default(Status::ON);
            $table->json('data')->nullable();
            $table->string('button')->nullable();
            FormBuilder::timestampFields($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(FormBuilder::getDb());
    }
};
