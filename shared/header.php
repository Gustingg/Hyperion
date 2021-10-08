<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap-icons/bootstrap-icons.css">
	<title><?php echo $_SESSION['pageTitle'] ?></title>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img id="logo" src="Imagens/hyperion.png" alt="Logotipo da Empresa">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="comofunciona.html" class="nav-link px-2 link-dark">Como Funciona</a></li>
                <li><a href="portifolio.html" class="nav-link px-2 link-dark">Portifólio</a></li>
                <?php
                if(isset($_SESSION['username']))
                    {
                        echo "<li><a href='pedidosdosclientes.php' class='nav-link px-2 link-dark'>Pedidos</a></li>";
                    }
                ?>
                <li><a href="contato.html" class="nav-link px-2 link-dark">Contato</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <?php
                    if(!isset($_SESSION['username']))
                    {
                        echo "<a role='button' class='btn btn-primary me-2' href='entrar.php'>Login</a>";
                        echo "<a role='button' class='btn btn-outline-primary' href='cadastre.html'>Cadastrar</a>";
                    }
                    else
                    {
                        echo"<div style='display: inline-flex;'>
                                <a class='nav-link px-2 link-dark'>Olá, ".$_SESSION['username']."</a>
                                <a role='button' href='sair.php' class='btn btn-outline-primary'>Sair</a>
                            </div>";  
                    }
                ?>
            </div>
        </header>
    </div>
