<section class="wrapper style4 container">
		<div class="row 150%">
			<div class="12u 12u(narrower)">
				<div style="border-bottom: 2px solid #83d3c9;">
				<h2 style="display: inline-block;"> Posts </h2>
				<?php
				if (!empty($_SESSION['login_user'])) {
					echo "<a href='index.php?c=Post&p=register' class='editarPost'><img src='../../images/add.png' alt='Add' width='22px'></a> ";
					echo "</div>";
				} else {
					echo "<a href='index.php?c=User&p=login' class='editarPost'><img src='../../images/add.png' alt='Add' width='22px'></a>";
					echo "</div>";
				}
					foreach ($posts as $post) {
						echo "<div class='post'>";
						echo "<a href='index.php?c=Post&p=list&idPost=$post->id'><h2 class='t1'>$post->title</h2></a>";
						if ((!empty($_SESSION['login_user'])) && ($post->idUser == $_SESSION['login_user'])) {
							echo "<a href='index.php?c=Post&p=edit&id=$post->id' class='editarPost'><img src='../../images/edit.png' alt='Edit' width='22px'></a>";
							echo "<a href='index.php?c=Post&p=delete&id=$post->id' class='editarPost'><img src='../../images/delete.png' alt='Delete' width='22px'></a>";
						}
						echo "<div class='conteudo'>$post->content</div>";
						echo "<h3 style='font-size:14px; display:inline-block;'>publicado por: $post->idUser </h3>";
						$cont=0;
						foreach ($comments as $comment){
							if ($comment->idPost == $post->id){
								$cont++;
							}
						}
						echo "<h2 style='font-size:14px;color: #83d3c9; display:inline-block;'>|comentários: $cont</h2>";
						echo "</div>";
					}
				?>
			</div>
		</div>
</section>