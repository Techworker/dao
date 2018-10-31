<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneyValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_values', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('PASC');
            $table->unsignedInteger('BTC');
            $table->unsignedInteger('USD');
            $table->unsignedInteger('AUD');
            $table->enum('money_type', ['PASC', 'BTC', 'BCH', 'AUD', 'USD', 'EUR']);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('money_values');
    }
}
