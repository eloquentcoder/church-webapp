<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->text('about_pastor')->nullable();
            $table->text('about_church')->nullable();
            $table->text('address')->nullable();
            $table->string('sermon_clip')->nullable();
            $table->string('sermon_clip_title')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('alt_number')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
