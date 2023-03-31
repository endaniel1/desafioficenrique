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
        Schema::create('entrepreneurships', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->bigInteger('commune_id')->unsigned();
            $table->foreign('commune_id')->references('id')->on('communes')->onDelete('cascade');
            $table->bigInteger('document_file_id')->unsigned();
            $table->foreign('document_file_id')->references('id')->on('document_files')->onDelete('cascade');

            $table->text('description')->nullable();
            $table->enum('status', ['0', '1', '2'])->default('0');// value:0 Pendiente o por resivir, value: 1 Aprobado, value: 2 Rechazado 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrepreneurships');
    }
};
