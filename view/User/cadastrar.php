<section class="wrapper style4 container">
	<div class="row 150%">
		<div class="8u 12u(narrower)">
			<h2 style='border-bottom: 2px solid #83d3c9; '> Cadastrar usuário </h2> <br />

			<form name="cadastrar" method="post">
				<div class="field">
					<label for="id">Usuário</label>
					<input type="text" name="id" id="id" placeholder="Nome de usuário desejado" required>
				</div>
				<div class="field">
					<label for="nome">Nome</label>
					<input type="text" name="nome" id="nome" placeholder="Seu nome" required>
				</div>
				<div class="field">
					<label for="senha">Senha</label>
					<input type="password" name="senha" id="senha" placeholder="Senha" required>
				</div>

				<ul class="buttons">
					<li><input type="submit" class="button special" value="adicionar" /></li>
				</ul>
				<a href='index.php?c=User&p=login'>Possui usuário? Faça login</a>
			</form>
		</div>
	</div>
</section>