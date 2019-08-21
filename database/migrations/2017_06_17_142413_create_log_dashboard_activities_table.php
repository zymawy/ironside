<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogDashboardActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_dashboard_activities', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->integer('subject_id')->unsigned()->index();
            $table->string('subject_type')->index();
            $table->string('name');
            $table->text('before')->nullable();
            $table->text('after')->nullable();
            $table->integer('user_id')->unsigned()->index();
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
        Schema::drop('log_admin_activities');
    }
}
