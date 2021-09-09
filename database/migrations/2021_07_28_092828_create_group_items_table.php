<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('group_id')->unsigned()->index();
//            $table->bigInteger('assignee')->unsigned()->index()->nullable();
            $table->string('name');
            $table->string('description')->default('')->nullable();
            $table->boolean('completed')->default(false);
            $table->boolean('important')->default(false);
            $table->timestamp('completed_at')->nullable();
//            $table->timestamps()

//            $table->foreign('assignee')->references('id')->on('users')
//                ->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')
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
        Schema::dropIfExists('group_items');
    }
}
