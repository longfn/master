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
        Schema::create('attachments', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->nullable(false)->autoIncrement();
            $table->char('uuid', 36)->nullable(false);
            $table->string('attachable_type', 255)->nullable(false);
            $table->bigInteger('attachable_id')->unsigned()->nullable(false);
            $table->string('file_path', 255)->default('');
            $table->string('file_name', 255)->default('');
            $table->string('extension', 255)->default('');
            $table->string('mime_type', 255)->default('');
            $table->integer('size')->unsigned()->nullable(false)->default(0);
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
        Schema::dropIfExists('attachments');
    }
};
