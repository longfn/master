<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->nullable(false)->autoIncrement();
            $table->string('room', 255)->nullable(false);
            $table->bigInteger('sender_id')->unsigned()->nullable(false)->foreign('sender_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('sender_type', 255)->nullable(false);
            $table->bigInteger('receiver_id')->unsigned()->nullable(false);
            $table->string('receiver_type', 255)->nullable(false);
            $table->text('content')->nullable(false);
            $table->string('content_type', 255)->nullable(false)->default('text');
            $table->integer('association_id')->unsigned()->nullable()->default(null);
            $table->string('association_type', 255)->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
