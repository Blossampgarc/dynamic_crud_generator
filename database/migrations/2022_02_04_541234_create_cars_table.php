<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatecarsTable extends Migration
{ 
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('name',255);$table->string('email',255);$table->integer('dob')->default(0);$table->string('address',255) ;
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->timestamp('deleted_at');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}