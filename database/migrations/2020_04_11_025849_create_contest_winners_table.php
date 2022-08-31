<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_winners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contest_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            
            $table->bigInteger('code_id')->unsigned();
            $table->foreign('code_id')->references('id')->on('customer_codes');
            
            $table->boolean('confirmed')->default(false);
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
        Schema::dropIfExists('contest_winners');
    }
}
