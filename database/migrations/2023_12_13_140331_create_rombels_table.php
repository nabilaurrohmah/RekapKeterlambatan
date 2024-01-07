<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRombelsTable extends Migration
{
    /**
     * Run the migration.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('rombels', function (Blueprint $table) {
            $table->id();
            $table->string('rombel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('rombels');
    }
};
