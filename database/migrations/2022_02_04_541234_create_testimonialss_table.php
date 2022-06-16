<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatetestimonialssTable extends Migration
{ 
    public function up()
    {
        Schema::create('testimonialss', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('my_id')->default(0);$table->string('enrollement',255);$table->string('address',255) ;
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('testimonialss');
    }
}