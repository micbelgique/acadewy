<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/

	'connections' => array(

	/*
	/ The DB connection information must be stored in
	/ a (gitignored) file called ".env.local.php" at the
	/ root of the project, as follow :

	/	return [
	/		"DB_HOST" 		=> "",
	/		"DB_NAME" 		=> "",
	/		"DB_USERNAME" 	=> "",
	/		"DB_PASSWORD" 	=> ""
	/	];
	/
	*/

		'mysql' => array(
			'driver'    => 'mysql',
			'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
			'host'      => getenv('DB_HOST'),
			'database'  => getenv('DB_NAME'),
			'username'  => getenv('DB_USERNAME'),
			'password'  => getenv('DB_PASSWORD'),
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

		'pgsql' => array(
			'driver'   => 'pgsql',
			'host'      => getenv('DB_HOST'),
			'database'  => getenv('DB_NAME'),
			'username'  => getenv('DB_USERNAME'),
			'password'  => getenv('DB_PASSWORD'),
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		),

	),

);
