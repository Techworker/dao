<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtendUserData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('name');
            $table->string('discord_username')->nullable();
            $table->enum('status', ['incomplete', 'pending', 'rejected', 'verified'])->default('incomplete');
            $table->string('avatar')->nullable();
            $table->longText('bio')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('address_line_3')->nullable();
            $table->string('street')->nullable();
            $table->string('house_number')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('rejected_reason')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable(); // ISO
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
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('discord_username');
            $table->dropColumn('status');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('organization_name');
            $table->dropColumn('address_line_1');
            $table->dropColumn('address_line_2');
            $table->dropColumn('address_line_3');
            $table->dropColumn('street');
            $table->dropColumn('house_number');
            $table->dropColumn('postal_code');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('deleted_at');
            $table->string('name');
        });

    }
}
