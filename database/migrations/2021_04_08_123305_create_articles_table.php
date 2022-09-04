<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codeArticle')->unique();
            $table->string('designation');
            $table->double('prix');
            $table->integer('qteInitial');
            $table->integer('qteMin');
            $table->integer('qteActuelle');
            $table->string('unite');
            $table->text('description')->nullable();
            $table->string('etat')->default('active');
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('fournisseur_id');
            $table->timestamps();
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->default(1);
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
