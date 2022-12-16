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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('message')->nullable();;
            $table->binary('file');
            $table->foreignId('userid')->nullable();
            $table->foreign('userid')->references('id')->on('users')->nullOnDelete();
            $table->foreignId('tipoid')->nullable();
            $table->foreign('tipoid')->references('id')->on('tipo')->nullOnDelete();
            $table->timestamps();
        }); 
        $sql = 'alter table post change file file longblob';
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
};
