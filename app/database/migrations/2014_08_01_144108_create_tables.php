<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->rememberToken();
			$table->timestamps();
		});

		Schema::create('profiles', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('firstname')->default('-');
			$table->string('lastname')->default('-');
			$table->timestamp('birthday')->default('-');
			$table->string('location')->default('-');
			$table->text('description')->default('-');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('resources', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->text('description');
			$table->string('link');
			$table->smallInteger('level');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('courses', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('categories', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name');
			$table->integer('parent_id')->unsigned()->index();
			$table->foreign('parent_id')->references('id')->on('categories')->unsigned()->nullable();
			$table->text('description');
			$table->timestamps();
		});

		Schema::create('communities', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->timestamps();
		});

		Schema::create('users_resources_link', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('resource_id')->unsigned()->index();
			$table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
			$table->boolean('favorited');
			$table->boolean('wishlisted');
			$table->boolean('completed');
			$table->timestamps();
		});

		Schema::create('courses_resources_link', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('course_id')->unsigned()->index();
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->integer('resource_id')->unsigned()->index();
			$table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
			$table->integer('order');
			$table->timestamps();
		});

		Schema::create('users_courses_link', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('course_id')->unsigned()->index();
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->boolean('favorited');
			$table->boolean('wishlisted');
			$table->boolean('completed');
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
		Schema::drop('users');
		Schema::drop('profiles');
		Schema::drop('resources');
		Schema::drop('courses');
		Schema::drop('categories');
		Schema::drop('communities');
		Schema::drop('users_resources_links');
		Schema::drop('courses_resources_link');
		Schema::drop('users_courses_link');
	}

}
