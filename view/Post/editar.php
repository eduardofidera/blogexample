<?php
	if (empty($_SESSION['login_user'])){
	header("Location: index.php?c=Post&p=listar");
	}
?>
<section class="wrapper style4 container">
	<div class="row 150%">
		<div class="8u 12u(narrower)">
			<h2 style='border-bottom: 2px solid #83d3c9; '> Editar post </h2> <br />
			<form name="cadastro" method="post">
			<?php
				foreach($posts as $post){
					if($post->id == filter_input(INPUT_GET, 'id')){
						$titulo = $post->titulo;
						$conteudo = $post->conteudo;
					}
				}
			?>
				<div class="field">
					<label for="titulo">Título</label>
					<input type="text" name="titulo" placeholder="Título do post" id="titulo" value="<?php echo $titulo ?>" required>
				</div>
				<div class="field">
					<label for="conteudo">Conteúdo</label>
					<input type="text" name="conteudo" placeholder="Conteúdo a ser publicado" id="conteudo" value="<?php echo $conteudo ?>" required>
				</div>

				<ul>
					<li><input type="submit" class="button special" value="editar" /></li>
				</ul>
			</form>
		</div>
	</div>
</section>