<?php
	if (empty($_SESSION['login_user'])){
	header("Location: index.php?c=Post&p=list");
	}
?>
<section class="wrapper style4 container">
	<div class="row 150%">
		<div class="8u 12u(narrower)">
			<h2 style='border-bottom: 2px solid #83d3c9; '> Publicar </h2> <br />
			<form name="editar" method="post">
				<div class="field">
					<label for="titulo">Título</label>
					<input type="text" name="title" placeholder="Título do post" id="title" required>
				</div>
				<div class="field">
					<label for="conteudo">Conteúdo</label>
					<input type="text" name="content" placeholder="Conteúdo a ser publicado" id="content" required>
				</div>

				<ul>
					<li><input type="submit" class="button special" value="publicar" /></li>
				</ul>
			</form>
		</div>
	</div>
</section>