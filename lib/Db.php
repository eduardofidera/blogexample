<?php
	class Db extends PDO {
		function __construct(){
			$user = 'trezo';
			$pass = 'naosaiam@trezo';
			$database = 'eduardo';
			$dsn = "mysql:host=mysql.trezo.com.br;dbname=$database";
			//configurar as opcoes
			$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);
			try {
				parent::__construct($dsn, $user, $pass, $options);
			} catch (PDOException $e){
				echo '<div class="alert alert-danger">';
				echo $e->getMessage();
				echo '</div>';
			}
		}
	}
?>