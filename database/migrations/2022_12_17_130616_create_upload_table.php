<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload', function (Blueprint $table) {
            $table->id();
            $table->binary('file');
            $table->foreignId('userid')->nullable();
            $table->foreignId('postid')->nullable();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('postid')->references('id')->on('post')->onDelete('cascade');
            $table->timestamps();
        });
        $sql = 'alter table upload change file file longblob';
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload');
    }
};
