<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->char('public_id', 5)->unique();
            $table->bigInteger('downloads')->default(0);
            $table->string('name', 300);
            $table->integer('size')->unsigned();
            $table->string('mimetype', 255);
            $table->string('location', 512);
            $table->ipAddress('uploader');
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
        Schema::dropIfExists('files');
    }
}
