<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('auth', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
        });
    }


public function down()
{
    Schema::dropIfExists('auth');
}

};
