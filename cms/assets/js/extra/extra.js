<?php 
header("Content-type: application/javascript; charset: UTF-8");

$file = $_GET['f'];

// make sure it's a js file
if (substr($file, -3) != '.js') exit;

// remove file hacking characters
$file = str_replace('../', '', $file);
$path = str_replace('assets/js/extra/extra.js', '', $_SERVER['SCRIPT_FILENAME']) . 'application/modules/';
// $path = str_replace('public', '', $_SERVER['DOCUMENT_ROOT']) . 'application/modules/';
// echo $path;
if (file_exists($path.$file))
{
	include($path.$file);
}