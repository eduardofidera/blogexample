<?php
class Comment{
	public $id;
	public $content;
	public $idUser;
	public $idPost;
	function __construct( $id = NULL ){ //construção do objeto
		if( !empty($id) ){
			$db = new Db();
			$rs = $db->prepare('SELECT * FROM comments WHERE id = :id');
			$rs->bindParam(':id', $id);
			$rs->execute();
			$row = $rs->fetch(PDO::FETCH_OBJ);
			if($row){
				$this->id = $row->id;
				$this->content = $row->content;
				$this->idUser = $row->idUser;
				$this->idPost = $row->idPost;
			}
		}
	}
	public function save(){
		$db = new Db();
		if( $this->id ){ 	# update, se o id existir no bd
			$sql = 'UPDATE comments SET content=:content WHERE id = :id';
			$sth = $db->prepare($sql);
			$sth->bindParam(':id', $this->id);
			$sth->bindParam(':content', $this->content);
			return $sth->execute();
		}else { 			# insert, se nao tiver od id no BD
			$sql = 'INSERT INTO comments (content, idUser, idPost) VALUES (:content, :idUser, :idPost)';
			$sth = $db->prepare($sql);
			$sth->bindParam(':content', $this->content);
			$sth->bindParam(':idUser', $this->idUser);
			$sth->bindParam(':idPost', $this->idPost);
			return $sth->execute();
		}
	}
	public function list(){
		$db = new Db();
		$idPost = filter_input(INPUT_GET, 'idPost');
		if ($idPost){
			$rs = $db->query ('SELECT * FROM comments WHERE idPost = '.$idPost); // rs = result set da query no db
			$comments = $rs->fetchAll(PDO::FETCH_CLASS, 'Comment');
			return $comments;
		}else {
			$rs = $db->query('SELECT * FROM comments'); // rs = result set da query no db
			$comments = $rs->fetchAll(PDO::FETCH_CLASS, 'Comment');
			return $comments;
		}
	}
	public function delete(){
		$db = new Db();
		$sql = 'DELETE FROM comments WHERE id=:id';
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $this->id);
		return $sth->execute();
	}
}
?>
