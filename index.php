<?php
require 'lib/Db.php';
require 'model/Post.php';
require 'model/User.php';
session_start();
#controller de inicio
$controller = filter_input(INPUT_GET,'c');
# metodo de inicio (quando carregar a pag)
$metodo = filter_input(INPUT_GET, 'p');
if(!$controller){
	# página inicial do site
	require 'controller/PostController.php';
	$dc = new PostController();
	$dc->listar();
}
else{
	$controller .= 'Controller';
	require 'controller/'.$controller.'.php';
	$dc = new $controller;
	if ($metodo){
	$dc->$metodo();
	} else {
	header("Location:index.php?c=Post&p=cadastrar");
	}
}
?>