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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();                                  //numero unique
            $table->string('name');                        //nom des categories comme: outillage, plomberie, électricité, etc.
            $table->string('slug')->unique();              //URL propre : "outils", "materiaux"
            $table->text('description')->nullable();       //Description optionnelle
            $table->string('image')->nullable();           //Image de la catégorie
            $table->boolean('is_active')->default(true);   //Indique si la catégorie est active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
