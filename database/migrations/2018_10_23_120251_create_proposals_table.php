<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('proposer_contractor_id');
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('website')->nullable();
            $table->string('source_code')->nullable();
            $table->string('proposed_value')->nullable();
            $table->string('proposed_currency')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('proposals');
    }
}
