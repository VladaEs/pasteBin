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
            $table->engine = 'InnoDB';
            $table->bigInteger('id')->unsigned()->primary();
            $table->bigInteger("paste_id")->unsigned();
            $table->bigInteger("category_id")->unsigned()->default(0);
            $table->bigInteger('paste_expiration')->nullable()->default(NULL);
            $table->boolean('paste_privacy')->default(0);
            $table->string("password", 255)->nullable()->default(NULL);
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("paste_categories")->onDelete("cascade");

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
