<?php
        session_start();
        isset($_GET['acao']) && $_GET['acao'] == 'editar' ? $_SESSION['pageTitle'] = 'Editar Pedido' : $_SESSION['pageTitle'] = 'Cadastrar Pedido';
	    include './shared/header.php';	
        if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
            require_once "conexao.php";
            $dbh = DBConnection::get();
            $x = $_GET['id'];
            $stmt = $dbh->prepare("SELECT * FROM pedido");
            $stmt->execute();
            $dados = $stmt->fetch(PDO::FETCH_ASSOC); 

            $dados['categorias'] = explode(",",$dados['categorias']);

            echo '
            <div class="d-grid justify-content-center">
                <form name="form2" action="actionpedido.php?acao=edit&id='.$_GET['id'].'" method="post" class="form-style">
                    <h1 class="d-grid justify-content-center mb-5">Edite o seu pedido</h1>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título do pedido:</label>
                        <input type="text" class="form-control" name="titulo" value='. $dados['titulo'] .'>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Por favor, descreva." name="descricao" style="height: 200px" maxlength="500">'. $dados['descricao'] .'</textarea>
                        <label for="descricao">Descrição</label>
                    </div>

                    Categorias:<br>';
                    foreach ($arrayCateg as &$categ){
                        if(in_array($categ, $dados['categorias'])){
                            echo'<div class="form-check">
                                <input class="form-check-input" type="checkbox" name="categorias[]" value="'.$categ.'" id="'.$categ.'" checked>
                                <label class="form-check-label" for="'.$categ.'">
                                    '.$categ.'
                                </label>
                            </div>';
                        }
                        else{
                            echo'<div class="form-check">
                                <input class="form-check-input" type="checkbox" name="categorias[]" value="'.$categ.'" id="'.$categ.'">
                                <label class="form-check-label" for="'.$categ.'">
                                    '.$categ.'
                                </label>
                            </div>';
                        }
                    }
            echo '
                    <div class="d-grid justify-content-center my-3">
                        <input class="btn btn-primary" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
            ';
        }
        else{
            echo '
            <div class="d-grid justify-content-center">
                <form name="form2" action="actionpedido.php?acao=add" method="post" class="form-style">
                    <h1 class="d-grid justify-content-center mb-5">Faça o seu pedido</h1>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título do pedido:</label>
                        <input type="text" class="form-control" name="titulo">
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Por favor, descreva." name="descricao" style="height: 200px" maxlength="500"></textarea>
                        <label for="descricao">Descrição</label>
                    </div>

                    Categorias:<br>';
                    foreach ($arrayCateg as &$categ){
                        echo'<div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categorias[]" value="'.$categ.'" id="'.$categ.'">
                            <label class="form-check-label" for="'.$categ.'">
                                '.$categ.'
                            </label>
                        </div>';
                    }
            echo '
                    <div class="d-grid justify-content-center my-3">
                        <input class="btn btn-primary" type="submit" value="Enviar">
                    </div>
                </form>
            </div>';
        }
    ?>
<?php include './shared/footer.php'?>

