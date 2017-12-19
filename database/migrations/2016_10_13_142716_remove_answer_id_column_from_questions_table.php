<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAnswerIdColumnFromQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('questions', function (Blueprint $table) {
////            $table->dropForeign(['answer_id']);
//            $table->dropColumn(['answer_id']);
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('questions', function (Blueprint $table) {
//            $table->integer('answer_id')->nullable()->unsigned();
//            $table->foreign('answer_id')->references('id')->on('answers');
//        });
    }
}
