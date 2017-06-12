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
						$title = $post->title;
						$content = $post->content;
					}
				}
			?>
				<div class="field">
					<label for="titulo">Título</label>
					<input type="text" name="title" placeholder="Título do post" id="title" value="<?php echo $title ?>" required>
				</div>
				<div class="field">
					<label for="conteudo">Conteúdo</label>
					<input type="text" name="content" placeholder="Conteúdo a ser publicado" id="content" value="<?php echo $content ?>" required>
				</div>

				<ul>
					<li><input type="submit" class="button special" value="editar" /></li>
				</ul>
			</form>
		</div>
	</div>
</section>