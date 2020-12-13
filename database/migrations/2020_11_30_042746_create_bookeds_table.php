<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBookedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookeds', function (Blueprint $table) {
            $table->id();
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();
            $table->integer('guest_count')->nullable();
            $table->integer('booked_room_count')->nullable();
            $table->string('guest_name')->nullable();
            $table->integer('guest_phone_number')->nullable();
            $table->text('guest_permanent_address')->nullable();
            $table->string('guest_ID_proof')->nullable();
            $table->tinyInteger('status')->nullable()->default(3)->comment('1:success; 3:pending; 4:failed;');
            $table->text('order_id')->nullable();
            $table->text('receipt_id')->nullable();             
            $table->text('rzp_payment_id')->nullable();
            $table->float('totalPrice')->nullable();             
            $table->string('email')->nullable();             
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
        Schema::dropIfExists('bookeds');
    }
}
