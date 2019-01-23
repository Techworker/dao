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
            $table->string('ident_code')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('slug')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('bio_html')->nullable();
            $table->enum('type', array_keys(\App\Contractor::TYPES))->default(key(\App\Contractor::TYPES));
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('public_name')->nullable();
            $table->string('pasa')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
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
