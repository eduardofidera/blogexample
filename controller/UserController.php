<?php
class UserController{
	public function register(){
		$id = filter_input(INPUT_POST, 'id');
		$name = filter_input(INPUT_POST, 'name');
		$pass = filter_input(INPUT_POST, 'pass');

		if ($id){ # o formulario foi enviado
			$a = new User(); // a = instância do objeto
			$a->id = $id;
			$a->name = $name;
			$a->pass = $pass;
			$a->save();
			$a->login();
		}
		$view = 'view/User/register.php';
		include 'template/template.php';
	}

	public function list(){
		$users = User::list();
		$view = 'view/Post/list.php';
		include 'template/template.php';
	}

	public function login(){
		$id = filter_input(INPUT_POST, 'id');
		$pass = filter_input(INPUT_POST, 'pass');
		if ($id){ # o formulario foi enviado
			$a = new User();
			$a->id = $id;
			$a->pass = $pass;
			$a->login();
		}
		$view = 'view/User/login.php';
		include 'template/template.php';
	}

	public function logout(){
		session_destroy();
		header("Location: index.php?c=Post&p=list");

	}
}
?>
