<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('group_details', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger("group_id");
            $table->foreign('group_id')->references('id')->on('groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('payment')->nullable();
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
        Schema::dropIfExists('group_details');
    }
};
