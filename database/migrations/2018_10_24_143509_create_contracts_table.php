<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table)
        {
            $table->increments('id');

            $table->unsignedInteger('proposal_id');
            $table->unsignedInteger('contractor_id');

            $table->boolean('needs_feedback')->default(false);

            $table->date('start_date');
            $table->date('payment_date')->nullable();

            $table->string('total_value');

            $table->string('role')->nullable();
            $table->longText('role_description')->nullable();
            $table->longText('payment_description')->nullable();
            $table->string('pasa')->nullable();
            $table->string('payload_overwrite')->nullable();
            $table->string('tax_declaration')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('proposal_id')->references('id')->on('proposals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
