<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Cadastro do cliente</title>
</head>
<body>
    <h2>Cadastro do cliente</h2>
    <form  name="form3" action="cadastrarcliente.php" method="post">
        
        <fieldset>
            <legend>Detalhes de contato</legend>

            <div>
                <label for="nome/ razão social">Nome/ Razão social:</label>
                <input type="text" name="nomeRazaoSocial" required autofocus>
            </div>

            <div>
                <label for="cpf/ cnpj">CPF/CNPJ:</label>
                <input type="text" name="cpfCnpj" required>
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
				<input type="checkbox" name="interesses"> Desenvolvimento de Sites
				<br>
				<input type="checkbox" name="interesses"> Estratégia de Marketing Digital
				<br>
				<input type="checkbox" name="interesses"> Machine Learning
				<br>
				<input type="checkbox" name="interesses"> Criação/Repaginação de Aplicativo Mobile (Android / IOS)
				<br>
				<input type="checkbox" name="interesses"> Big Data
				<br>
				<input type="checkbox" name="interesses"> IA
				<br>
				<input type="checkbox" name="interesses"> ChatBot
				<br>
				<input type="checkbox" name="interesses"> Assistente Virtual Inteligente 
				<br>
				<input type="checkbox" name="interesses"> Cibersegurança
				<br>
				<input type="checkbox" name="interesses"> Software de Gestão Empresarial 
				<br>

            <div>
                <input class="submit2" type="submit" value="Enviar">
            </div>
        </form>
</body>
</html>

