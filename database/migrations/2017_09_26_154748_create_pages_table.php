<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->string('name');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->integer('list_order')->nullable();
            $table->boolean('is_header')->nullable();
            $table->integer('header_order')->nullable();
            $table->boolean('is_footer')->nullable();
            $table->integer('footer_order')->nullable();
            $table->boolean('is_hidden')->default(0);
            $table->boolean('is_featured')->nullable();
            $table->integer('featured_order')->nullable();
            $table->integer('parent_id')->unsigned()->default(0);
            $table->integer('url_parent_id')->unsigned()->default(0);
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('social_shares')->default(0);
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
        Schema::drop('pages');
    }
}
