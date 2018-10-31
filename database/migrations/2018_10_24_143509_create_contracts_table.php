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

            $table->enum('type', array_keys(\App\Contract::TYPES))->default(key(\App\Contract::TYPES));
            $table->enum('payout_type', array_keys(\App\Contract::PAYOUT_TYPES))->default(key(\App\Contract::PAYOUT_TYPES));
            $table->boolean('needs_feedback')->default(false);

            $table->date('start');
            $table->date('end')->nullable();

            $table->string('total_value');
            $table->string('total_currency');

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
        Schema::dropIfExists('contracts');
    }
}
