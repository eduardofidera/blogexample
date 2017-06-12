<?php
class User{
	public $id;
	public $name;
	public $pass;
	function __construct( ){
		if( !empty($id) ){
			$db = new Db();
			$rs = $db->prepare('SELECT * FROM users WHERE id = :id');
			$rs->bindParam(':id', $id);
			$rs->execute();
			$row = $rs->fetch(PDO::FETCH_OBJ);
			if($row){
				$this->id = $row->id;
				$this->name = $row->name;
				$this->pass = $row->pass;
			}
		}
	}
	public function save(){
		$db = new Db();
		$rs = $db->prepare('SELECT * FROM users WHERE id= :id');
		$rs->bindParam(':id', $this->id);
		$rs->execute();
		$row = $rs->fetch(PDO::FETCH_OBJ);
		if ($row) {
			print_r ("Usuário já existe.");
		} else {
			$sql = 'INSERT INTO users VALUES (:id, :name, :pass)';
			$sth = $db->prepare($sql);
			$sth->bindParam(':id', $this->id);
			$sth->bindParam(':name', $this->name);
			$sth->bindParam(':pass', $this->pass);
			header("Location: index.php?c=Post&p=list");
			return $sth->execute();
		}
	}
	public function login(){
		$db = new Db();
		$id = $this->id;
		$pass = $this->pass;
		if ($id) {
			$rs = $db->prepare('SELECT * FROM users WHERE id= :id AND pass= :pass');
			$rs->bindParam(':id', $id);
			$rs->bindParam(':pass', $pass);
			$rs->execute();
			$row = $rs->fetch(PDO::FETCH_OBJ);
			if ($row) {
				$_SESSION['login_user']=$row->id;
				$_SESSION['login_name']=$row->name;
				header("Location: index.php?c=Post&p=list");
			} else {
				header("Location: index.php?c=User&p=login");
			}
		}
	}

}
?>