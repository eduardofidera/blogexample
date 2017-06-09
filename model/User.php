<?php
class User{
	public $id;
	public $nome;
	public $senha;
	function __construct( ){
		if( !empty($id) ){
			$db = new Db();
			$rs = $db->prepare('SELECT * FROM users WHERE id = :id');
			$rs->bindParam(':id', $id);
			$rs->execute();
			$row = $rs->fetch(PDO::FETCH_OBJ);
			if($row){
				$this->id = $row->id;
				$this->nome = $row->nome;
				$this->senha = $row->senha;
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
			$sql = 'INSERT INTO users VALUES (:id, :nome, :senha)';
			$sth = $db->prepare($sql);
			$sth->bindParam(':id', $this->id);
			$sth->bindParam(':nome', $this->nome);
			$sth->bindParam(':senha', $this->senha);
			header("Location: index.php?c=Post&p=listar");
			return $sth->execute();
		}
	}

	public function login(){
			$db = new Db();
			$id = $this->id;
			$senha = $this->senha;
			if ($id) {
			$rs = $db->prepare('SELECT * FROM users WHERE id= :id AND senha= :senha');
			$rs->bindParam(':id', $id);
			$rs->bindParam(':senha', $senha);
			$rs->execute();
			$row = $rs->fetch(PDO::FETCH_OBJ);
			if ($row) {
				$_SESSION['login_user']=$row->id;
				$_SESSION['login_nome']=$row->nome;
				header("Location: index.php?c=Post&p=listar");
			} else {
				print_r("Usuario ou senha incorretos.");
			}
		}
	}

}
?>