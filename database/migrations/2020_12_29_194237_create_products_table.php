<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');

            $table->string('name');
            $table->string('description');
            $table->text('body');
            $table->decimal('price', 10, 2); //tamanho e quantidade de caracteres após ponto
            $table->string('slug'); //para melhorar a aparência da URL do produto

            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores'); //cria chave estrangeira no padrão: nomeTabela_nomeColuna_foreign
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
