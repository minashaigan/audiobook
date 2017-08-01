<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeTaggingTagged extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tagging_tagged', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('tagging_tags', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('tagging_tag_groups', function (Blueprint $table) {
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
        Schema::table('tagging_tagged', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('tagging_tags', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('tagging_tag_groups', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
