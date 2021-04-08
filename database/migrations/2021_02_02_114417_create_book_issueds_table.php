<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookIssuedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_issueds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->bigInteger('request_id')->nullable()->unsigned();
            $table->foreign('request_id')->references('id')->on('book_requests')->onDelete('set null');
            $table->bigInteger('book_id')->nullable()->unsigned();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('set null');
            $table->string('book_name');
            $table->string('issued_by');
            $table->string('issued_to');
            $table->date('issued_at');
            $table->date('return_date');
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
        Schema::dropIfExists('book_issueds');
    }
}
