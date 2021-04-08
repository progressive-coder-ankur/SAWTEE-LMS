<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_id')->nullable()->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('set null');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->string('name', 200);
            $table->string('designation', 200)->nullable();
            $table->string('orgname', 250)->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile');
            $table->string('email1', 250)->unique();
            $table->string('fax')->nullable();
            $table->string('gender')->nullable();
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
        Schema::dropIfExists('event_lists');
    }
}
