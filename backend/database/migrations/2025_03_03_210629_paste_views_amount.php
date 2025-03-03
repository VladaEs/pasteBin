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
        Schema::create('paste_views', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paste_id')->unique();
            $table->integer('views_amount')->default(0);
            $table->timestamps();


            $table->foreign('paste_id')
                  ->references('id')
                  ->on('pastes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
