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
        Schema::create("campeones", function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string("nombre");
            $table->bigInteger("estilo_ID")->unsigned()->nullable();
            $table->bigInteger("posicion_ID")->unsigned()->nullable();
            $table->timestamps();
            $table->foreign("estilo_ID")->references("id")->on("estilos")->onDelete("set null");
            $table->foreign("posicion_ID")->references("id")->on("posiciones")->onDelete("set null");
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists("campeones");
    }
};
