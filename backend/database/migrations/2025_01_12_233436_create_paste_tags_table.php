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
        Schema::create('paste_tags', function (Blueprint $table) {
            $table->id();
            $table->foreign("paste_id")->references("pastes")->on("id")->onDelete("cascade");
            $table->foreign("tag_id")->references("tags")->on("id")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paste_tags');
    }
};
