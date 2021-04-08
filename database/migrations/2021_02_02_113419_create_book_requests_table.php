<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->bigInteger('book_id')->nullable()->unsigned();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('set null');
            $table->string('requested_by')->nullable();
            $table->string('book_name');
            $table->longText('message')->nullable();
            $table->boolean('issued')->default('0');
            $table->timestamp('requested_at');
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
        Schema::dropIfExists('book_requests');
    }
}
