<?php
class Post{
	public $id;
	public $titulo;
	public $conteudo;
	public $idUser;
	function __construct( $id = NULL ){
		if( !empty($id) ){
			$db = new Db();
			$rs = $db->prepare('SELECT * FROM markers WHERE id = :id');
			$rs->bindParam(':id', $id);
			$rs->execute();
			$row = $rs->fetch(PDO::FETCH_OBJ);
			if($row){
				$this->id = $row->id;
				$this->titulo = $row->titulo;
				$this->conteudo = $row->conteudo;
				$this->idUser = $row->idUser;
			}
		}
	}

	public function save(){
		$db = new Db();
		if ((strlen($this->titulo)) > 100 || (strlen($this->conteudo) > 200)){
			header("Location: index.php?c=Post&p=listar");
		} else {
			if( $this->id ){ 	# update, se o id existir no bd
				$sql = 'UPDATE posts SET titulo=:titulo, conteudo=:conteudo WHERE id = :id';
				$sth = $db->prepare($sql);
				$sth->bindParam(':id', $this->id);
				$sth->bindParam(':titulo', $this->titulo);
				$sth->bindParam(':conteudo', $this->conteudo);
				return $sth->execute();
				}else { 			# insert, se nao tiver od id no BD
					$sql = 'INSERT INTO posts (titulo, conteudo, idUser) VALUES (:titulo, :conteudo, :idUser)';
					$sth = $db->prepare($sql);
					$sth->bindParam(':titulo', $this->titulo);
					$sth->bindParam(':conteudo', $this->conteudo);
					$sth->bindParam(':idUser', $this->idUser);
					return $sth->execute();
				}
		}
	}

	public function listar(){
		$db = new Db();
		$rs = $db->query('SELECT * FROM posts');
		$posts = $rs->fetchAll(PDO::FETCH_CLASS, 'Post');
		return $posts;
	}
	public function deletar(){
		$db = new Db();
		$sql = 'DELETE FROM posts WHERE id=:id';
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $this->id);
		return $sth->execute();
	}
}
?>
