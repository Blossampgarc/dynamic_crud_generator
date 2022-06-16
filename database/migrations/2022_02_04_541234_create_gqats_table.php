<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreategqatsTable extends Migration
{ 
    public function up()
    {
        Schema::create('gqats', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('hithere',255);$table->string('email',255);$table->text('password',255);$table->integer('hytgyht')->default(0);$table->integer('emp_id')->default(0);
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('gqats');
    }
}