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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')                //lien vers la table produit 
            ->constrained()                                //verifie que la clé étrangère existe dans la table produits
            ->onDelete('cascade');               // si un produit est supprimé, les images associées seront aussi supprimées    
            $table->string('image_path');          //chemin de l'image
            $table->boolean('is_primary')->default(false);   //Indique si c'est l'image principale du produit
            $table->integer('order')->default(0);          //Ordre d'affichage des images
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
