<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('property_comment')->nullable();
            $table->longText('file')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
					->onDelete('cascade')
					->onUpdate('cascade');

            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')->references('id')->on('properties')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedTinyInteger('status')->default(0);
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
        Schema::dropIfExists('property_comments');
    }
}
