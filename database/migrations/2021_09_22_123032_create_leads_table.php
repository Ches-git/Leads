<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->default('')->nullable();
            $table->string('email')->default('')->nullable();
            $table->string('telephone')->default('')->nullable();
            $table->string('date')->default('')->nullable();
            $table->string('time_landing')->default('')->nullable();
            $table->string('time')->default('')->nullable();
            $table->string('aktion')->default('')->nullable();
            $table->string('quelle')->default('')->nullable();
            $table->string('call_to_action')->default('')->nullable();
            $table->string('page')->default('')->nullable();
            $table->string('url')->default('')->nullable();
            $table->string('status')->default('')->nullable();
            $table->boolean('resubmission')->default(false);

//            $table->uuid('id')->primary();
            $table->string('guid')->unique();
//            $table->char('guid', 36)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead');
    }
}
