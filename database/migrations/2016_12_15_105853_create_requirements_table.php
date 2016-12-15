<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->nullable();
            $table->string('name')->nullable();
            $table->text('requirements')->nullable();
            $table->text('process')->nullable();
            $table->string('url')->nullable();
            $table->string('tested_by')->nullable();
            $table->tinyInteger('passed')->nullable();
            $table->text('bugs')->nullable();
            $table->text('aesthetic')->nullable();
            $table->text('wish_list')->nullable();
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
        Schema::dropIfExists('requirements');
    }
}
