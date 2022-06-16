<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreaterecordssTable extends Migration
{ 
    public function up()
    {
        Schema::create('recordss', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('my_id')->default(0);$table->string('username',255);$table->string('enrollement',255) ;
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('recordss');
    }
}