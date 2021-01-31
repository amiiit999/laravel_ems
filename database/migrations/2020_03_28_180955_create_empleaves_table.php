<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleaves', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('employee_id');
             $table->string('month');
            $table->integer('leaves');
            $table->integer('late_coming1');
            $table->integer('late_coming2');
             $table->integer('short_break');
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
        Schema::dropIfExists('empleaves');
    }
}
