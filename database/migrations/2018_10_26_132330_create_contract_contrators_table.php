<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractContratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_contractor', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contract_id');
            $table->unsignedInteger('contractor_id');
            $table->enum('type', ['no_pay', 'payable'])->default('no_pay');
            $table->integer('percent')->default(100);
            $table->string('role')->nullable();
            $table->longText('role_description')->nullable();
            $table->string('pasa')->nullable();
            $table->string('payload')->nullable();

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
        Schema::dropIfExists('contract_contractor');
    }
}
