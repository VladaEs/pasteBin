<?php

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
        Schema::create('paste_settings', function (Blueprint $table) {
            $table->id();
            $table->integer("paste_id");
            $table->foreign("category_id")->references("paste_categories")->on("id")->delete("cascade");
            $table->bigInteger('paste_expiration')->nullable()->default(NULL);
            $table->boolean('paste_privacy')->default(0);
            $table->string("password", 255)->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paste_settings');
    }
};
