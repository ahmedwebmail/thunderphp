<?php

function view( string $file, array $param = [] ){
	require_once "../app/views/".$file.".php";
}

function redirect( string $file){
	$dest = "../app/views/".$file.".php";
	header("location: $dest");
}