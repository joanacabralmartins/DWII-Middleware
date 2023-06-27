<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('docencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professor')->references('id')->on('profs');
            $table->unsignedBigInteger('disciplina')->references('id')->on('disciplinas');
            $table->softDeletes();       
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('docencias');
    }
};
