<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowingHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowing_history', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('book_id') ;
            $table->unsignedSmallInteger('user_id');
            $table->dateTime('borrowed_at') ;
            $table->dateTime('returned_at')->nullable();
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
        Schema::dropIfExists('borrowing_history');
    }
}
