<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatetrycasTable extends Migration
{ 
    public function up()
    {
        Schema::create('trycas', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('name',255);$table->string('email',255);$table->string('password',255) ;
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->timestamp('deleted_at')->default(null);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('trycas');
    }
}