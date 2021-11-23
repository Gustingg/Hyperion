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
    <?php $arrayCateg = ['Desenvolvimento de Sites', 'Estratégia de Marketing Digital', 'Machine Learning', 'Criação/Repaginação de Aplicativo Mobile (Android / IOS)s', 'Big Data', 'IA', 'ChatBot', 'Assistente Virtual Inteligente', 'Cibersegurança', 'Software de Gestão Empresarial']; ?>
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
                        echo "<button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Cadastrar</button>";
                        echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='exampleModalLabel'>Cadastrar</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <form name='form3' action='cadastrarcliente.php' method='post'>
                                <div class='modal-body'>
                                    <div class='mb-2'>
                                        <label for='nomeRazaoSocial' class='form-label'>Nome/Razão Social:</label>
                                        <input class='form-control' type='text' name='nomeRazaoSocial' required autofocus>
                                    </div>
                                    <div class='mb-2'>
                                        <label for='cpf/ cnpj'>CPF/CNPJ:</label>
                                        <input class='form-control' type='text' name='cpfCnpj' required>
                                    </div>
                                    <div class='mb-2'>
                                        <label for='endereço'>Endereço:</label>
                                        <input class='form-control' type='text' name='endereco' required placeholder='ex: rua, número, bairro'>
                                    </div>
                                    <div class='mb-2'>
                                        <label for='email'>Email:</label>
                                        <input class='form-control' type='email' name='email' required>
                                    </div>
                                    <div class='mb-2'>
                                        <label for='telefone'>Telefone:</label>
                                        <input class='form-control' type='tel' name='telefone' required>
                                    </div>
                                    <div class='mb-2'>
                                        <label for='senha'>Senha:</label>
                                        <input class='form-control' type='senha' name='senha' required>
                                    </div>
                                    <div class='mb-2'>
                                        <label>Categorias:</label>
                                        <div class='btn-group' role='group' aria-label='Grupo '>";
                                        $i = 0;
                                            foreach ($arrayCateg as &$categ){
                                                echo'
                                                    <input  type="checkbox" class="btn-check" autocomplete="off" name="categorias[]" value="'.$categ.'" id="'.$categ.'">
                                                    <label class="btn btn-outline-primary" for="'.$categ.'">
                                                        '.$categ.'
                                                    </label>';
                                                    if (($i % 3) == 0)
                                                        echo '<br/>';
                                                $i++;
                                            };
                                        echo"</div>
                                            <br>
                                            <input type='checkbox' name='interesses'> Desenvolvimento de Sites
                                            <br>
                                            <input type='checkbox' name='interesses'> Estratégia de Marketing Digital
                                            <br>
                                            <input type='checkbox' name='interesses'> Machine Learning
                                            <br>
                                            <input type='checkbox' name='interesses'> Criação/Repaginação de Aplicativo Mobile (Android / IOS)
                                            <br>
                                            <input type='checkbox' name='interesses'> Big Data
                                            <br>
                                            <input type='checkbox' name='interesses'> IA
                                            <br>
                                            <input type='checkbox' name='interesses'> ChatBot
                                            <br>
                                            <input type='checkbox' name='interesses'> Assistente Virtual Inteligente 
                                            <br>
                                            <input type='checkbox' name='interesses'> Cibersegurança
                                            <br>
                                            <input type='checkbox' name='interesses'> Software de Gestão Empresarial 
                                            <br>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                <button type='button' class='btn btn-primary'>Save changes</button>
                                </div>
                            </form>
                          </div>
                        </div>
                      </div>";
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
