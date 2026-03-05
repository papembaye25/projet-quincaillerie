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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')                //lien vers la table categorie
            ->constrained()                                 //verifie que la clé étrangère existe dans la table categories
            ->onDelete('cascade');                          // si une catégorie est supprimée, les produits associés seront aussi supprimés
            $table->string('name');                         //nom du produit
            $table->string('slug')->unique();               //URL propre : "marteau
            $table->text('description')->nullable();        //Description optionnelle
            $table->decimal('price', 10, 2);                //prix du produit
            $table->boolean('is_featured')->default(false);   //Mis en avant sur accueil
            $table->boolean('is_active')->default(true);    //Indique si le produit est actif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
