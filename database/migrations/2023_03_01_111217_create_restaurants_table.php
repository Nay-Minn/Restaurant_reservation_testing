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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('english_name');
            $table->string('myanmar_name');
            $table->string('username');
            $table->string('phone')->nullable();
            $table->string('passcode');
            $table->string('confirm_passcode');
            $table->string('city')->nullable();
            $table->string('township')->nullable();
            $table->text('address')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('cover_photo')->nullable();
            $table->unsignedBigInteger('restaurant_group_id')->default(0);
            $table->foreign('restaurant_group_id')->references('id')->on('restaurant_groups')->onDelete('cascade');
            $table->boolean('status');
            $table->integer('rating')->nullable();
            $table->time('opening_hours')->nullable();
            $table->time('closing_hours')->nullable();
            $table->json('opening_day_id')->nullable();
            $table->string('reservation_cancel_minutes')->nullable();
            $table->string('cancel_refund_percentage')->nullable();
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
        Schema::dropIfExists('restaurants');
    }
};
