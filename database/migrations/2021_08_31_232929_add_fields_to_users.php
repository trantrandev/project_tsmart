<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           $table->string('phone', 15)->nullable();
           $table->enum('gender',['male', 'female'])->default('male');
           $table->enum('status',['active', 'disable'])->default('active');
           $table->string('avatar', 255)->nullable();
           $table->text('address')->nullable();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('status');
            $table->dropColumn('avatar');
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
}
