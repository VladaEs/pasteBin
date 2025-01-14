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
        Schema::create('pastes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id')->unsigned()->primary();  // Основной ID для таблицы Pastes
            $table->string("filename", 255);
            $table->bigInteger("author_id")->unsigned();
            $table->timestamps();


        });
        Schema::table('pastes', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id')->references('paste_id')->on('paste_settings')->onDelete('cascade');
            $table->foreign('id')->references('paste_id')->on('paste_tags')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pastes');
    }
};
