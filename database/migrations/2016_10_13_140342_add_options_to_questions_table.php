<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOptionsToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->string('correct_answer');
            $table->string('option1');
            $table->string('option2');
            $table->string('option3');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('correct_answer');
            $table->dropColumn('option1');
            $table->dropColumn('option2');
            $table->dropColumn('option3');
        });
    }
}
