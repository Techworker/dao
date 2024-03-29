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
            $table->string('ident_code')->nullable();
            $table->unsignedInteger('proposer_contractor_id');
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('intro')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_html')->nullable();
            $table->longText('payment_proposal')->nullable();
            $table->longText('notes_contractor')->nullable();
            $table->longText('notes_internal')->nullable();
            $table->string('website')->nullable();
            $table->enum('voting_type', [
                    \App\Proposal::VOTING_TYPE_DISCORD,
                    \App\Proposal::VOTING_TYPE_BLOCKCHAIN,
                    \App\Proposal::VOTING_TYPE_NONE]
            )->default(\App\Proposal::VOTING_TYPE_DISCORD);
            $table->dateTime('voting_start')->nullable();
            $table->dateTime('voting_end')->nullable();
            $table->integer('voting_result_pro')->nullable();
            $table->integer('voting_result_contra')->nullable();
            $table->string('source_code')->nullable();
            $table->string('proposed_value')->nullable();
            $table->string('proposed_currency')->nullable();
            $table->string('logo')->nullable();
            $table->string('forum_link')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('proposer_contractor_id')->references('id')->on('contractors');
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
