<?php
/**
 * Created by PhpStorm.
 * User: ironside
 * Date: 12/29/18
 * Time: 5:10 AM.
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->json('title');
            $table->string('slug');
            $table->smallInteger('zoom_level')->nullable();
            $table->string('latitude', '50')->nullable();
            $table->string('longitude', '50')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cities');
    }
}
