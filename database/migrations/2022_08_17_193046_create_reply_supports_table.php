<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_support', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE'); //um suporte vai pertencer a um usuario
            $table->foreignId('adimin_id')->constrained('users')->onDelete('CASCADE'); //um suporte vai pertencer a um usuario
            $table->foreignId('support_id')->constrained('supports')->onDelete('CASCADE'); //um suporte vai pertencer a uma aula
            $table->text('description');
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
        Schema::dropIfExists('reply_support');
    }
};
