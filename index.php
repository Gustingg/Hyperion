<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilo.css">
	<title>Home</title>
	<?php 
		session_start();	
	?>
</head>
<body>
	<header><!-- Início header -->
		<div>
			<h1 id="nomesite">Hyperion Technological Solution</a></h1>
            <p ><img id="logo" src="Imagens/logo 1.png" alt="Logo 2.png"></p> 	
		</div>	
		

		<nav id="cabeçalho">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="empresa.html">Empresa</a></li>
			<li><a href="comofunciona.html">Como Funciona</a></li>
			<li><a href="portifolio.html">Portifólio</a></li>
			<li><a href="contato.html">Contato </a> </li>
			<?php
				if(!isset($_SESSION['username']))
				{
					echo"<li class='login'><a href='entrar.php'>Entrar</a></li>";
					echo"<li class='login'><a href='cadastre.html'>Cadastre-se</a></li>";
				}
				else
				{
					echo"<li class='login'><a href='sair.php'>Sair</a></li>";
					echo"<li class='login'><a>Olá, ".$_SESSION['username']." </a></li>";					
				}
			?>
		</ul>
		</nav>
	</header><!--/fim header -->

	<div id="container1">
		<br>
		<br>
	  	<p><img id="imagem1" src="Imagens/laptop.jpg.png" alt="laptop.jpg">
		<p  id="conteudo1">Milhares de parceiros prontos para começar a trabalhar no seu projeto</p>
	</div>
	<br>
	<br>
	<div id="container2">
		<h2>Bem-vindo</h2>
		<p><img id="imagem2" src="Imagens/security.jpg.jpg" alt="security.jpg"></p>
		<p id="conteudo2">Fique à vontade e conheça uma empresa inovadora, que preza pelo bom atendimento e
		 preço justo, visamos atender todas as necessidades de nossos clientes da melhor maneira possível.</p>
			
	</div>
	<br>
	<div id="container3">
		<br>
		<br>
		<h2 >Principais habilidades dos nossos parceiros</h2>
		<br>
		<ul class="listas">
			<li>Sites (Desenvolvimento de Site – E-commerce... )</li>
			<br>
			<li>Aplicativo Mobile (Android / IOS)</li>
			<br>
			<li>Estratégia de Marketing Digital</li>
			<br>
			<li>Machine Learning </li>
			<br>
			<br>
		</ul>

		<ul class="listas">
			<li>Software de Gestão Empresarial (Estoque / Controle Financeiro / ...) </li>
			<br>
			<li>Cibersegurança</li>
			<br>
			<li>IoT</li>
			<br>
			<li>Big Data</li>
			<br>
			<br>
		</ul>

		<ul class="listas">
			<li>IA</li>
			<br>
			<li>ChatBot</li>
			<br>
			<li>Assistente Virtual </li>
			<br>
			<br>
		</ul>
	</div>

	<div id="container-rodape" style="clear: both;">
		<div id="rodape">
			&copy; Copyright 2000-2021 Hyperion Technological Solution
		</div>
	</div>

	
</body>
</html>