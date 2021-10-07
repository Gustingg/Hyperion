<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Pedido</title>
</head>
<body>
    <h1>Faça o seu pedido</h1>
		<form  name="form2" action="cadastrarpedido.php" method="post">
			
			<fieldset>
				<legend><h2>Detalhes do pedido</h2> </legend>

				<div>
					<label for="titulo">Título do pedido:</label>
					<input type="text" name="titulo" required autofocus>
				</div>
                <br>

				<div>
					<label for="descricao">Descrição:</label>
                    <textarea rows="10" cols="40" maxlength="500" name="descricao"></textarea>
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

//listagem
       <php>
        echo "<h2>Listagem</h2>";
        $sql = "SELECT i.id, i.descricao, i.qtde, i.valor, i.id_verba, v.descricao as verba 
        FROM item i, verba v
        where i.id_verba=v.id
        order by i.descricao";
        $stmt = $conn->prepare($sql); //statement
        $stmt->execute(); //executa a instrução SQL
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC); //pega os dados da instrução SQL
        echo "<table><tr><td width='30'>id</td><td width='120'>Descrição</td><td>Quantidade</td>
        <td>Valor</td><td>Verba</td><td> </td></tr>";
        foreach ($dados as $registro) {
            echo "<tr><td>".$registro['id']."</td>";
            echo "<td>".$registro['descricao']."</td>";
            echo "<td>".$registro['qtde']."</td>";
            echo "<td> R$ ".$registro['valor']."</td>";
            echo "<td>".$registro['verba']."</td>
            <td><a href='caditem.php?acao=editar&id=".$registro['id']."'>Editar</a> 
            <a href='caditem.php?acao=excluir&id=".$registro['id']."'>Excluir</a></td></tr>";
        }
        echo "</table>";
    }//chave do if da session
    else {
        echo "<h2>Você não tem permissão para acessar esta página, faça login.</h2>";
    }
</php>
            

</body>
</html>

