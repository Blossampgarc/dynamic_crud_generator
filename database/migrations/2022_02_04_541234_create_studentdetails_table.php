<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatestudentdetailsTable extends Migration
{ 
    public function up()
    {
        Schema::create('studentdetails', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('enrollment')->default(0);$table->string('name',255);$table->string('address',255);$table->string('f_name',255);
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('studentdetails');
    }
}