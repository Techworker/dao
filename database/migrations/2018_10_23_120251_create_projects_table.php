<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->longText('description');
            $table->string('website');
            $table->string('source_code')->nullable();
            $table->string('costs');
            $table->string('pasa');
            $table->string('logo');
            $table->enum('status', ['draft', 'proposed', 'accepted', 'active', 'rejected', 'finished'])->default('draft');
            $table->longText('rejected_reason')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
