<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_returns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->bigInteger('issue_id')->nullable()->unsigned();
            $table->foreign('issue_id')->references('id')->on('book_issueds')->onDelete('set null');
            $table->string('book_name');
            $table->date('issued_at');
            $table->string('returned_by');
            $table->string('returned_to');
            $table->date('returned_date');
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
        Schema::dropIfExists('book_returns');
    }
}
