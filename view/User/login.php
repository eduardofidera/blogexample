<?php
	if (!empty($_SESSION['login_user'])){
	header("Location: index.php?c=Post&p=listar");
	}
?>
<section class="wrapper style4 container">
	<div class="row 150%">
		<div class="8u 12u(narrower)">
			<h2 style='border-bottom: 2px solid #83d3c9; '> Usuário login </h2> <br />

			<form name="cadastro" method="post">
				<div class="field">
					<label for="id">Usuário</label>
					<input type="text" name="id" placeholder="Seu nome de suário" id="id" required>
				</div>
				<div class="field">
					<label for="senha">Senha</label>
					<input type="password" name="senha" id="senha" placeholder="Sua senha" required>
				</div>

				<ul class="buttons">
					<li><input type="submit" class="button special" value="login" /></li>
				</ul>
				<a href='index.php?c=User&p=cadastrar'>Não possui usuário? Cadastre-se</a>
			</form>
		</div>
	</div>
</section>