<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatepararellsTable extends Migration
{ 
    public function up()
    {
        Schema::create('pararells', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('name',255);$table->text('address',255);$table->integer('phone_number')->default(0);$table->date('dob',);$table->string('editor',2555);$table->mediumText('image',2555);$table->mediumText('video',2555);
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('pararells');
    }
}