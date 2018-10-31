<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contract_id');
            $table->unsignedInteger('invoice_id');
            $table->longText('feedback');
            $table->boolean('audited_user_id');
            $table->boolean('audited');
            $table->string('audit_message');
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
        Schema::dropIfExists('contract_feedbacks');
    }
}
