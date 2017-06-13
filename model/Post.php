<?php
class Post{
	public $id;
	public $title;
	public $content;
	public $idUser;
	function __construct( $id = NULL ){//construção do objeto
		if( !empty($id) ){
			$db = new Db();
			$rs = $db->prepare('SELECT * FROM markers WHERE id = :id'); // rs = result set da query no db
			$rs->bindParam(':id', $id);
			$rs->execute();
			$row = $rs->fetch(PDO::FETCH_OBJ);
			if($row){
				$this->id = $row->id;
				$this->title = $row->title;
				$this->content = $row->content;
				$this->idUser = $row->idUser;
			}
		}
	}
	public function save(){
		$db = new Db();
		if ((strlen($this->title)) > 100 || (strlen($this->content) > 200)){
			header("Location: index.php?c=Post&p=listar");
		} else {
		if( $this->id ){ 	# update, se o id existir no bd
			$sql = 'UPDATE posts SET title=:title, content=:content WHERE id = :id';
			$sth = $db->prepare($sql);
			$sth->bindParam(':id', $this->id);
			$sth->bindParam(':title', $this->title);
			$sth->bindParam(':content', $this->content);
			return $sth->execute();
			}else { 			# insert, se nao tiver od id no BD
				$sql = 'INSERT INTO posts (title, content, idUser) VALUES (:title, :content, :idUser)';
				$sth = $db->prepare($sql);
				$sth->bindParam(':title', $this->title);
				$sth->bindParam(':content', $this->content);
				$sth->bindParam(':idUser', $this->idUser);
				return $sth->execute();
			}
		}
	}
	public function list(){
		$db = new Db();
		$idPost = filter_input(INPUT_GET, 'idPost');
		if ($idPost){
			$rs = $db->query ('SELECT * FROM posts WHERE id = '.$idPost); // rs = result set da query no db
			$posts = $rs->fetchAll(PDO::FETCH_CLASS, 'Post');
			return $posts;
		}else {
			$rs = $db->query('SELECT * FROM posts'); // rs = result set da query no db
			$posts = $rs->fetchAll(PDO::FETCH_CLASS, 'Post');
			return $posts;
		}
	}
	public function delete(){
		$db = new Db();
		$sql = 'DELETE FROM comments WHERE idPost=:id';
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $this->id);
		$sth->execute();
		$sql = 'DELETE FROM posts WHERE id=:id';
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $this->id);
		return $sth->execute();
	}
}
?>
