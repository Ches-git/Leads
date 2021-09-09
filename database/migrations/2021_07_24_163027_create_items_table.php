<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
//            $table->integer('user_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('name');
            $table->string('description')->default('')->nullable();
            $table->boolean('completed')->default(false);
            $table->boolean('important')->default(false);
            $table->timestamp('completed_at')->nullable();
//            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
