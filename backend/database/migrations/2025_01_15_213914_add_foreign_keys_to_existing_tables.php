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
        Schema::table('paste_tags', function (Blueprint $table) {
            $table->foreign("paste_id")->references("id")->on("pastes")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("tag_id")->references("id")->on("tags")->onUpdate("cascade")->onDelete("cascade");
        });
        Schema::table('pastes', function (Blueprint $table) {
            $table->foreign("author_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");

        });
        Schema::table('paste_settings', function (Blueprint $table) {
            $table->foreign("paste_id")->references("id")->on("pastes")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("category_id")->references("id")->on("paste_categories")->onUpdate("cascade")->onDelete("cascade");
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('existing_tables', function (Blueprint $table) {
            //
        });
    }
};
