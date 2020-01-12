<?php
	date_default_timezone_set('Asia/Bangkok');
	header('Access-Control-Allow-Origin: *');
	include_once("class.database.php");
	define("host", "localhost");
	define("user", "root");
	define("pass", "");
	define("dbname", "db_home_account");
	$DATABASE = new Database(host, user, pass, dbname);
	$POSTDATA = file_get_contents("php://input");
	$REQUEST = json_decode($POSTDATA);