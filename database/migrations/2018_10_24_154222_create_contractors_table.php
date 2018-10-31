<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('logo')->nullable();
            $table->string('slug')->nullable();
            $table->longText('bio')->nullable();
            $table->enum('type', array_keys(\App\Contractor::TYPES))->default(key(\App\Contractor::TYPES));
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('pasa')->nullable();
            $table->boolean('approved')->default(false);
            $table->dateTime('approved_at')->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('contractors');
    }
}
