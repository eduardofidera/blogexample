<?php
class CommentController{
	public function register(){
		$content = filter_input(INPUT_POST, 'content');
		$idPost = filter_input(INPUT_GET, 'idPost');
		if ($content){
			# o formulario foi enviado
			$a = new Comment(); // a = instância do objeto
			$a->content = $content;
			$a->idUser = $_SESSION['login_user'];
			$a->idPost = filter_input(INPUT_GET, 'idPost');
			$a->save();
			header("Location: index.php?c=Post&p=list&idPost=$idPost");
		}
		$view = 'view/Post/listDetail.php';
		include 'template/template.php';
	}

	public function list(){
		$idPost = filter_input(INPUT_GET, 'idPost');
		if ($idPost){
			print_r("eae");
			$comments = Comment::list();
			$view = 'view/Post/listDetail.php';
			include 'template/template.php';
		} else {
			$comments = Comment::list();
			$view = 'view/Post/listDetail.php';
			include 'template/template.php';
		}
	}

	public function edit(){
		$idPost = filter_input(INPUT_GET, 'idPost');
		$content = filter_input(INPUT_POST, 'content');
		$comments = Comment::list();
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
		$view = 'view/Post/listDetail.php';
		include 'template/template.php';
	}

	public function delete(){
		$id = filter_input(INPUT_GET, 'id');
		$idPost = filter_input(INPUT_GET, 'idPost');
		$comments = Comment::list();
		foreach ($comments as $comment) {
			if (($comment->idUser == $_SESSION['login_user']) && ($comment->id == $id)) {
				$a = new Comment();
				$a->id = $id;
				$a->delete();
				header("Location: index.php?c=Post&p=list&idPost=$idPost");
			} else {
				header("Location: index.php?c=Post&p=list&idPost=$idPost");
			}
		}
	}
}
?>
