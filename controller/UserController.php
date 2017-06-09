<?php
class UserController{
	public function cadastrar(){
		$id = filter_input(INPUT_POST, 'id');
		$nome = filter_input(INPUT_POST, 'nome');
		$senha = filter_input(INPUT_POST, 'senha');

		if ($id){ # o formulario foi enviado
			$a = new User();
			$a->id = $id;
			$a->nome = $nome;
			$a->senha = $senha;
			$a->save();
			$a->login();
		}
		$view = 'view/User/cadastrar.php';
		include 'template/template.php';
	}

	public function listar(){
		$users = User::listar();
		$view = 'view/Post/listar.php';
		include 'template/template.php';
	}

	public function login(){
		$id = filter_input(INPUT_POST, 'id');
		$senha = filter_input(INPUT_POST, 'senha');
		if ($id){ # o formulario foi enviado
			$a = new User();
			$a->id = $id;
			$a->senha = $senha;
			$a->login();
		}
		$view = 'view/User/login.php';
		include 'template/template.php';
	}

	public function logout(){
		session_destroy();
		header("Location: index.php?c=Post&p=listar");

	}
}
?>
