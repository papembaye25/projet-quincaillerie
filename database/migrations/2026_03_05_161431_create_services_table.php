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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');                        //Titre du service
            $table->text('description')->nullable();       //Description du service
            $table->string('icon')->nullable();                  //Icône représentant le service
            $table->integer('order')->default(0);          //Ordre d'affichage des services
            $table->boolean('is_active')->default(true);    //Indique si le service est actif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
