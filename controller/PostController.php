<?php
class PostController{
	public function cadastrar(){
		$titulo = filter_input(INPUT_POST, 'titulo');
		$conteudo = filter_input(INPUT_POST, 'conteudo');

		if ($titulo){
			# o formulario foi enviado
			$a = new Post();
			$a->titulo = $titulo;
			$a->conteudo = $conteudo;
			$a->idUser = $_SESSION['login_user'];
			$a->save();
			header("Location: index.php?c=Post&p=listar");
		}
		$view = 'view/Post/cadastrar.php';
		include 'template/template.php';
	}

	public function listar(){
		$posts = Post::listar();
		$view = 'view/Post/listar.php';
		include 'template/template.php';
	}

	public function editar(){
		$id = filter_input(INPUT_GET, 'id');
		$titulo = filter_input(INPUT_POST, 'titulo');
		$conteudo = filter_input(INPUT_POST, 'conteudo');
		$posts = Post::listar();
		if ($titulo){
			# o formulario foi enviado
			$a = new Post();
			$a->id = $id;
			$a->titulo = $titulo;
			$a->conteudo = $conteudo;
			$a->idUser = $_SESSION['login_user'];
			$a->save();
			header("Location: index.php?c=Post&p=listar");
		}
		$view = 'view/Post/editar.php';
		include 'template/template.php';
	}

	public function deletar(){
		$id = filter_input(INPUT_GET, 'id');
		$posts = Post::listar();
			foreach ($posts as $post) {
				if (($post->idUser == $_SESSION['login_user']) && ($post->id == $id)) {
					$a = new Post();
					$a->id = $id;
					$a->deletar();
					header("Location: index.php?c=Post&p=listar");
				} else {
					header("Location: index.php?c=Post&p=listar");
				}
			}
	}
}
?>
