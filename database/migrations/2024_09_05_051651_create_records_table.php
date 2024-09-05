<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('upload_file_id')->constrained('upload_files')->onDelete('cascade');
            $table->string('field1')->nullable();
            $table->string('field2')->nullable();
            $table->integer('field3')->nullable();
            $table->string('field4')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('records');
    }
}
