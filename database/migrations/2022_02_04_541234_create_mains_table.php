<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateprettysTable extends Migration
{ 
    public function up()
    {
        Schema::create('mains', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('name',255);
            $table->text('field_name',2555);
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->timestamp('deleted_at');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('mains');
    }
}