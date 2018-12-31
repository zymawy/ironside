<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationDashboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //navigation_admin
        Schema::create('navigation_dashboard', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->json('title');
            $table->json('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->json('help_index_title')->nullable();
            $table->json('help_index_content')->nullable();
            $table->json('help_create_title')->nullable();
            $table->json('help_create_content')->nullable();
            $table->json('help_edit_title')->nullable();
            $table->json('help_edit_content')->nullable();
            $table->integer('list_order')->default(999);
            $table->tinyInteger('is_hidden')->default(0);
            $table->integer('parent_id')->default(0);
            $table->integer('url_parent_id')->default(0);
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
        Schema::drop('navigation_admin');
    }
}
