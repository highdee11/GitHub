<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
 	// ini_set('short_open_tag', 1);
	define('THEME', 'datingapp');
	define('BASE_URL', 'https://www.leffix.playworld.nl');

	include_once __DIR__ . '/source/functions.php';
	
	showpage();
?>