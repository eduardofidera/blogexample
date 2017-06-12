<?php
class PostController{
	public function register(){
		$title = filter_input(INPUT_POST, 'title');
		$content = filter_input(INPUT_POST, 'content');

		if ($title){
			# o formulario foi enviado
			$a = new Post();
			$a->title = $title;
			$a->content = $content;
			$a->idUser = $_SESSION['login_user'];
			$a->save();
			header("Location: index.php?c=Post&p=list");
		}
		$view = 'view/Post/register.php';
		include 'template/template.php';
	}

	public function list(){
		$idPost = filter_input(INPUT_GET, 'idPost');
		if ($idPost){
			$posts = Post::list();
			$comments = Comment::list();
			$content = filter_input(INPUT_POST, 'content');
			if ($content){ //Registro do comentário
				$a = new Comment();
				$a->content = $content;
				$a->idUser = $_SESSION['login_user'];
				$a->idPost = filter_input(INPUT_GET, 'idPost');
				$a->save();
				header("Location: index.php?c=Post&p=list&idPost=$idPost");
			}
			$view = 'view/Post/listDetail.php';
			include 'template/template.php';
		} else {
			$posts = Post::list();
			$comments = Comment::list();
			$view = 'view/Post/list.php';
			include 'template/template.php';
		}
	}

	public function edit(){
		$id = filter_input(INPUT_GET, 'id');
		$title = filter_input(INPUT_POST, 'title');
		$content = filter_input(INPUT_POST, 'content');
		$posts = Post::list();
		if ($title){
			# o formulario foi enviado
			$a = new Post();
			$a->id = $id;
			$a->title = $title;
			$a->content = $content;
			$a->idUser = $_SESSION['login_user'];
			$a->save();
			header("Location: index.php?c=Post&p=list");
		}
		$view = 'view/Post/edit.php';
		include 'template/template.php';
	}

	public function delete(){
		$id = filter_input(INPUT_GET, 'id');
		$posts = Post::list();
		foreach ($posts as $post) {
			if (($post->idUser == $_SESSION['login_user']) && ($post->id == $id)) {
				$a = new Post();
				$a->id = $id;
				$a->delete();
				header("Location: index.php?c=Post&p=list");
			} else {
				header("Location: index.php?c=Post&p=list");
			}
		}
	}
}
?>
