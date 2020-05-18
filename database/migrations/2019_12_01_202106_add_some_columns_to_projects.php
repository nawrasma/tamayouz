<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('pro_uni',100);
            $table->date('pro_date',100);
            $table->string('pro_ppt',100);
            $table->integer('is_video');
            $table->integer('pro_season');
            $table->string('pro_responsers',100);
            $table->string('pro_grade',50);
            $table->Text('pro_recommend');
            $table->integer('user_id')->unsigned();
            $table->integer('season_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['pro_uni','pro_date','pro_ppt','is_video','pro_season','pro_responsers','pro_grade','pro_recommend','user_id','season_id']);
        });
    }
}
