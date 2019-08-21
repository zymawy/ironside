<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->index()->unsigned();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email', 50)->index()->unique();
            $table->string('cellphone', 50)->nullable();
            $table->string('telephone', 50)->nullable();
            $table->string('image', 50)->nullable();
            $table->string('gender', 10)->nullable();
            $table->date('born_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('confirmation_token')->nullable();
            $table->timestamp('logged_in_at')->nullable();
            $table->timestamps();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('password_updated_at')->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('email');
            $table->dropColumn('cellphone');
            $table->dropColumn('telephone');
            $table->dropColumn('image');
            $table->dropColumn('gender');
            $table->dropColumn('born_at');
            $table->dropColumn('password');
            $table->dropColumn('remember_token');
            $table->dropColumn('confirmation_token');
            $table->dropColumn('logged_in_at');
            $table->dropColumn('confirmed_at');
            $table->dropColumn('password_updated_at');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_by');
            $table->dropColumn('deleted_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
