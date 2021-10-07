<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Cadastro da empresa</title>
</head>
<body>
    <h2>Cadastro da empresa</h2>
		<form  name="form2" action="cadastrarempresa.php" method="post">
			
			<fieldset>
				<legend>Detalhes de contato </legend>

				<div>
					<label for="razão social">Razão social:</label>
					<input type="text" name="razaosocial" required autofocus>
				</div>

				<div>
					<label for="cnpj">CNPJ:</label>
					<input type="text" name="cnpj" required>
				</div>

				<div>
					<label for="endereço">Endereço:</label>
					<input type="text" name="endereco" required placeholder="ex: rua, número, bairro">
				</div>

                <div>
					<label for="email">Email:</label>
					<input type="email" name="email" required>
				</div>

                <div>
					<label for="telefone">Telefone:</label>
					<input type="tel" name="telefone" required>
				</div>

				<div>
					<label for="senha">Senha:</label>
					<input type="senha" name="senha" required>
				</div>
				

                Categorias:<br>
				<input type="checkbox" name="categorias"> Desenvolvimento de Sites
				<br>
				<input type="checkbox" name="categorias"> Estratégia de Marketing Digital
				<br>
				<input type="checkbox" name="categorias"> Machine Learning
				<br>
				<input type="checkbox" name="categorias"> Criação/Repaginação de Aplicativo Mobile (Android / IOS)
				<br>
				<input type="checkbox" name="categorias"> Big Data
				<br>
				<input type="checkbox" name="categorias"> IA
				<br>
				<input type="checkbox" name="categorias"> ChatBot
				<br>
				<input type="checkbox" name="categorias"> Assistente Virtual Inteligente 
				<br>
				<input type="checkbox" name="categorias"> Cibersegurança
				<br>
				<input type="checkbox" name="categorias"> Software de Gestão Empresarial 
				<br>

				<div>
					<input class="submit2" type="submit" value="Enviar">
				</div>
			</form>	
</body>
</html>

