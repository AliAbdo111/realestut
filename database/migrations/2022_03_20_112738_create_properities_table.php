<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Properity;

class CreateProperitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('address');
            $table->string('price');
            $table->string('image1')->nullable(); 
            $table->string('image2')->nullable(); 
            $table->string('image3')->nullable(); 
            $table->string('image4')->nullable(); 
            $table->string('image5')->nullable(); 
            $table->string('type');
            $table->enum('status', ['pending', 'approved','rejected'])->default('pending');
            $table->text('desc')->nullable();
            $table->enum('Wi-Fi', ['Yes','No'])->default('No');
            $table->enum('Air Conditioner', ['Yes','No'])->default('No');
            $table->foreignId('advertiser_id')->onDelete('cascade')->onUpdate('cascade');
        });

        //return redirect(route('properities.feed'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properities');
    }
}
