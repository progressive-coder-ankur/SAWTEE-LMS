<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by')->nullable()->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->bigInteger('updated_by')->nullable()->unsigned();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->string('shelf', 20);
            $table->string('title', 100);
            $table->string('author', 50);
            $table->string('publisher', 100)->nullable();
            $table->string('ISBN')->nullable();
            $table->string('published_year')->nullable();
            $table->string('category');
            $table->integer('bookCount');
            $table->softDeletes();
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
        Schema::dropIfExists('books');
    }
}
