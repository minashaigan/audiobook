<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFinanceToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('phone')->nullable();
            $table->integer('finance_amount')->default(0);
        });
    }
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('phone');
            $table->dropColumn('finance_amount');
        });
    }
}