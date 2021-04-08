<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->string('title', 20);
            $table->string('name', 200);
            $table->string('designation', 200)->nullable();
            $table->string('category');
            $table->string('orgname', 250)->nullable();
            $table->string('orgdept', 50)->nullable();
            $table->string('orgaddress', 250)->nullable();
            $table->string('address1', 300)->nullable();
            $table->string('address2', 300)->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip', 20, 0)->nullable();
            $table->string('country', 50);
            $table->string('phone')->nullable();
            $table->string('mobile');
            $table->string('email1', 250)->unique();
            $table->string('email2', 250)->unique()->nullable();
            $table->string('fax')->nullable();
            $table->string('pobox')->nullable();
            $table->string('gender');
            $table->string('language');
            $table->string('ext')->nullable();
            $table->string('list', 100);
            $table->string('region', 100);
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
        Schema::dropIfExists('contacts');
    }
}
