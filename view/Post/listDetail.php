	<section class="wrapper style4 container">
	<div class="row 150%">
		<div class="12u 12u(narrower)">
			<div style="border-bottom: 2px solid #83d3c9;">
				<?php

				foreach ($posts as $post) {
					echo "<h2 class='t1' style='display: inline-block;'> $post->title </h2>";
					if ((!empty($_SESSION['login_user'])) && ($post->idUser == $_SESSION['login_user'])) {
						echo "<a href='index.php?c=Post&p=edit&id=$post->id' class='editarPost'><img src='../../images/edit.png' alt='Edit' width='22px'></a>";
						echo "<a href='index.php?c=Post&p=delete&id=$post->id' class='editarPost'><img src='../../images/delete.png' alt='Delete' width='22px'></a>";
						echo "</div>";
					} else {
						echo "</div>";
					}
					echo "<div class='conteudo'>$post->content</div>";
					echo "<h3 style='font-size:14px; display:inline-block; margin-bottom: 100px;'>publicado por: $post->idUser </h3>";
				}
				if (!empty($_SESSION['login_user'])) {
					?>
					<form name='comment' method='post' style="margin-top: 40px;">
						<div class='field'>
							<label for='content'>Deixe um comentário</label>
							<input type='text' name='content' placeholder='Comentário' id='content' required>
						</div>
						<ul>
							<li><input type="submit" class="button special" value="comentar" /></li>
						</ul>
					</form>
					<?php
				} else {
					echo "<a style='margin-top:30px; display:block;' href='index.php?c=User&p=login'>Faça login para comentar</a>";
				}
				echo "<div style='border-bottom: 1px solid #83d3c9;'><h2>Comentários</h2></div>";
				foreach ($comments as $comment){
					echo "<div class='comentario'>";
					echo "<h1 style='display:inline-block;word-wrap: break-word;width:100%; font-size:16px;'> $comment->content <h2 style='font-size:14px;color: #83d3c9; display:inline-block;'>comentário por: $comment->idUser</h2></h1>";
					if ((!empty($_SESSION['login_user'])) && ($comment->idUser == $_SESSION['login_user'])) {
							echo "<a href='index.php?c=Comment&p=delete&id=$comment->id&idPost=$comment->idPost' class='editarPost'><img src='../../images/delete.png' alt='Delete' width='22px'></a>";
						}
					echo "</div>";
				}
				?>
			</div>
		</div>
	</section>