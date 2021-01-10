<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRoomDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_details', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->float('rate')->nullable();
            $table->integer('total_room_count')->nullable();
            $table->integer('available_room_count')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1:active; 3:deactive');
            $table->integer('priority')->nullable()->default(1);
            // $table->timestamps();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room-_details');
    }
}
