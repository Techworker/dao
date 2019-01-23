<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoundationPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foundation_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('from_pasa');
            $table->unsignedInteger('to_pasa');
            $table->decimal('amount', 10, 4);
            $table->string('payload');
            $table->string('block');
            $table->string('ophash')->index('found_payments_ophash');
            $table->unsignedInteger('time');
            $table->unsignedInteger('contract_id')->nullable();
            $table->timestamps();

            $table->foreign('contract_id')->references('id')->on('contracts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foundation_payments');
    }
}
