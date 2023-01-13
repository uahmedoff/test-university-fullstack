<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration{

    
    public function up(){
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('subject_id');
            $table->enum('day_of_the_week',['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'])->comment('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
            $table->time('classtime');
            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('room_id')
                ->references('id')
                ->on('rooms')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // $table->unique(['group_id','room_id','subject_id','day_of_the_week','classtime']);   
        });
    }

    
    public function down(){
        Schema::dropIfExists('schedule');
    }

};
