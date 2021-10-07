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
    <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
            require_once "conexao.php";
            $dbh = DBConnection::get();
            $x = $_GET['id'];
            $stmt = $dbh->prepare("SELECT * FROM pedido WHERE id = $x" );
            $stmt->execute();
            $dados = $stmt->fetch(PDO::FETCH_ASSOC); 

            $dados['categorias'] = explode(",",$dados['categorias']);

            echo '<h1>Edite o seu pedido</h1>
            <form name="form2" action="actionpedido.php?acao=edit&id='.$_GET['id'].'" method="post">
			
			<fieldset>
				<legend><h2>Detalhes do pedido</h2> </legend>

				<div>
					<label for="titulo">Título do pedido:</label>
					<input type="text" name="titulo" required autofocus value='. $dados['titulo'] .'>
				</div>
                <br>

				<div>
					<label for="descricao">Descrição:</label>
                    <textarea rows="10" cols="40" maxlength="500" name="descricao">'. $dados['descricao'] .'</textarea>
				</div>
				

                Categorias:<br>';
                if(in_array("Desenvolvimento de Sites", $dados['categorias']))
				    echo '<br><input type="checkbox" name="categorias[]" value="Desenvolvimento de Sites" checked> Desenvolvimento de Sites';
                else
                    echo '<br><input type="checkbox" name="categorias[]" value="Desenvolvimento de Sites"> Desenvolvimento de Sites';

                if(in_array("Estratégia de Marketing Digital", $dados['categorias']))
				    echo '<br><input type="checkbox" name="categorias[]" value="Estratégia de Marketing Digital" checked> Estratégia de Marketing Digital';
                else
                    echo '<br><input type="checkbox" name="categorias[]" value="Estratégia de Marketing Digital"> Estratégia de Marketing Digital';

                if(in_array("Machine Learning", $dados['categorias']))
				    echo '<br><input type="checkbox" name="categorias[]" value="Machine Learning" checked> Machine Learning';
                else
                    echo '<br><input type="checkbox" name="categorias[]" value="Machine Learning"> Machine Learning';

                if(in_array("Criação/Repaginação de Aplicativo Mobile (Android / IOS)s", $dados['categorias']))
				    echo '<br><input type="checkbox" name="categorias[]" value="Criação/Repaginação de Aplicativo Mobile (Android / IOS)" checked> Criação/Repaginação de Aplicativo Mobile (Android / IOS)';
                else
                    echo '<br><input type="checkbox" name="categorias[]" value="Criação/Repaginação de Aplicativo Mobile (Android / IOS)"> Criação/Repaginação de Aplicativo Mobile (Android / IOS)';

                if(in_array("Big Data", $dados['categorias']))
				    echo '<br><input type="checkbox" name="categorias[]" value="Big Data" checked> Big Data';
                else
                    echo '<br><input type="checkbox" name="categorias[]" value="Big Data"> Big Data';

                if(in_array("IA", $dados['categorias']))
				    echo '<br><input type="checkbox" name="categorias[]" value="IA" checked> IA';
                else
                    echo '<br><input type="checkbox" name="categorias[]" value="IA"> IA';

                if(in_array("ChatBot", $dados['categorias']))
				    echo '<br><input type="checkbox" name="categorias[]" value="ChatBot" checked> ChatBot';
                else
                    echo '<br><input type="checkbox" name="categorias[]" value="ChatBot"> ChatBot';

                if(in_array("Assistente Virtual Inteligente", $dados['categorias']))
				    echo '<br><input type="checkbox" name="categorias[]" value="Assistente Virtual Inteligente" checked> Assistente Virtual Inteligente';
                else
                    echo '<br><input type="checkbox" name="categorias[]" value="Assistente Virtual Inteligente"> Assistente Virtual Inteligente';

                if(in_array("Cibersegurança", $dados['categorias']))
				    echo '<br><input type="checkbox" name="categorias[]" value="Cibersegurança" checked> Cibersegurança';
                else
                    echo '<br><input type="checkbox" name="categorias[]" value="Cibersegurança"> Cibersegurança';

                if(in_array("Software de Gestão Empresarial ", $dados['categorias']))
				    echo '<br><input type="checkbox" name="categorias[]" value="Software de Gestão Empresarial " checked> Software de Gestão Empresarial<br>';
                else
                    echo '<br><input type="checkbox" name="categorias[]" value="Software de Gestão Empresarial "> Software de Gestão Empresarial<br>';

                echo'
				<div>
					<input class="submit2" type="submit" value="Enviar">
				</div>
			</form>';

            $dbh = DBConnection::get();
        
            echo "<h2>Listagem</h2>";
            $sql = "SELECT * FROM pedido";
            $stmt = $dbh->prepare($sql); //statement
            $stmt->execute(); //executa a instrução SQL
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC); //pega os dados da instrução SQL

            echo "<table><tr><td width='30'>id</td><td width='120'>Descrição</td><td>Quantidade</td>
            <td>Valor</td><td>Verba</td><td> </td></tr>";
            foreach ($dados as $registro) {
                echo "<tr><td>".$registro['id']."</td>";
                echo "<td>".$registro['titulo']."</td>";
                echo "<td>".$registro['descricao']."</td>";
                echo "<td>".$registro['categorias']."</td>
                <td><a href='pedido.php?acao=editar&id=".$registro['id']."'>Editar</a> 
                <a href='caditem.php?acao=excluir&id=".$registro['id']."'>Excluir</a></td></tr>";
            }
            echo "</table>";
        }
        else{
            echo '
            <h1>Faça o seu pedido</h1>                
            <form name="form2" action="actionpedido.php" method="post">
			
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
				<input type="checkbox" name="categorias[]" value="Desenvolvimento de Sites"> Desenvolvimento de Sites
				<br>
				<input type="checkbox" name="categorias[]" value="Estratégia de Marketing Digital"> Estratégia de Marketing Digital
				<br>
				<input type="checkbox" name="categorias[]" value="Machine Learning"> Machine Learning
				<br>
				<input type="checkbox" name="categorias[]" value="Criação/Repaginação de Aplicativo Mobile (Android / IOS)"> Criação/Repaginação de Aplicativo Mobile (Android / IOS)
				<br>
				<input type="checkbox" name="categorias[]" value="Big Data"> Big Data
				<br>
				<input type="checkbox" name="categorias[]" value="IA"> IA
				<br>
				<input type="checkbox" name="categorias[]" value="ChatBot"> ChatBot
				<br>
				<input type="checkbox" name="categorias[]" value="Assistente Virtual Inteligente"> Assistente Virtual Inteligente
				<br>
				<input type="checkbox" name="categorias[]" value="Cibersegurança"> Cibersegurança
				<br>
				<input type="checkbox" name="categorias[]" value="Software de Gestão Empresarial"> Software de Gestão Empresarial 
				<br>

				<div>
					<input class="submit2" type="submit" value="Enviar">
				</div>
			</form>';
            require_once "conexao.php";
            $dbh = DBConnection::get();
        
            echo "<h2>Listagem</h2>";
            $sql = "SELECT * FROM pedido";
            $stmt = $dbh->prepare($sql); //statement
            $stmt->execute(); //executa a instrução SQL
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC); //pega os dados da instrução SQL

            echo "<table><tr><td width='30'>id</td><td width='120'>Descrição</td><td>Quantidade</td>
            <td>Valor</td><td>Verba</td><td> </td></tr>";
            foreach ($dados as $registro) {
                echo "<tr><td>".$registro['id']."</td>";
                echo "<td>".$registro['titulo']."</td>";
                echo "<td>".$registro['descricao']."</td>";
                echo "<td>".$registro['categorias']."</td>
                <td><a href='pedido.php?acao=editar&id=".$registro['id']."'>Editar</a> 
                <a href='caditem.php?acao=excluir&id=".$registro['id']."'>Excluir</a></td></tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>

