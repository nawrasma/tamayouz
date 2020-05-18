<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pro_name',100);
            $table->string('pro_email',100)->unique();
            $table->Text('stud_name');
            $table->string('pro_domain',100);
            $table->string('pro_type',100);
            $table->string('pro_photo',100);
            $table->string('pro_video',100);
            $table->string('pro_file',100);
            $table->string('super_name',100);
            $table->longText('pro_desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
