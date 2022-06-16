<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateracesTable extends Migration
{ 
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('racer_name',255);$table->mediumText('image',2555);$table->integer('phone_number')->default(0) ;
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('races');
    }
}