<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateadminsTable extends Migration
{ 
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('admin_name',255);$table->string('department',255);$table->mediumText('image',2555);
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}