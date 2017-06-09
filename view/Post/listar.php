<section class="wrapper style4 container">
		<div class="row 150%">
			<div class="12u 12u(narrower)">
				<div style="border-bottom: 2px solid #83d3c9;">
				<h2 style="display: inline-block;"> Posts </h2>
				<?php
				if (!empty($_SESSION['login_user'])) {
					echo "<a href='index.php?c=Post&p=cadastrar' class='editarPost'><img src='../../images/add.png' alt='Add' width='22px'></a> ";
					echo "</div>";
				} else {
					echo "<a href='index.php?c=User&p=login' class='editarPost'><img src='../../images/add.png' alt='Add' width='22px'></a>";
					echo "</div>";
				}
					foreach ($posts as $post) {
						echo "<div class='post'>";
						echo "<h2 class='t1'>$post->titulo</h2>";
						if ((!empty($_SESSION['login_user'])) && ($post->idUser == $_SESSION['login_user'])) {
							echo "<a href='index.php?c=Post&p=editar&id=$post->id' class='editarPost'><img src='../../images/edit.png' alt='Edit' width='22px'></a>";
							echo "<a href='index.php?c=Post&p=deletar&id=$post->id' class='editarPost'><img src='../../images/delete.png' alt='Delete' width='22px'></a>";
						}
						echo "<div class='conteudo'>$post->conteudo</div>";
						echo "<h3 style='font-size:14px; display:inline-block;'>publicado por: $post->idUser </h3>";
						echo "<h2 style='font-size:14px;color: #83d3c9; display:inline-block;'>|comentários: 0</h2>";
						echo "</div>";
					}
				?>
			</div>
		</div>
</section>