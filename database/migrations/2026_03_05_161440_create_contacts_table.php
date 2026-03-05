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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');                        //Nom de la personne qui contacte
            $table->string('email');                       //Email de la personne
            $table->string('phone')->nullable();            //Numéro de téléphone
            $table->text('message');                        //Contenu du message
            $table->boolean('is_read')->default(false);     //Indique si le message a été lu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
