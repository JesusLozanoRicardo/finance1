<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',40)->nullable();
            $table->string('horario', 80)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('be')->nullable();
            $table->string('dribbble')->nullable();
            $table->string('github')->nullable();
            $table->string('texto1')->nullable();
            $table->string('texto2')->nullable();
            $table->string('texto3')->nullable();
            $table->string('texto4')->nullable();
            $table->string('texto5')->nullable();
            $table->string('texto1_contacto')->nullable();
            $table->string('texto2_contacto')->nullable();
            $table->string('texto1_nosotros')->nullable();
            $table->string('texto2_nosotros')->nullable();
            $table->string('texto1_servicios')->nullable();
            $table->string('texto2_servicios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('headers');
    }
}
