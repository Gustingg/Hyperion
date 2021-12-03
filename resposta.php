<?php
    require_once "conexao.php";
    session_start();
    $_SESSION['pageTitle'] = 'Resposta';
    include './shared/header.php';	
    $dbh = DBConnection::get();

    if(isset($_SESSION['usernameCli']) && isset($_GET['id']))
    {
        $sql = "SELECT * FROM pedidos_resposta WHERE id_cliente =".$_SESSION['id']." AND id = ".$_GET['id'];
    }
    if(isset($_SESSION['usernameEmp']) && isset($_GET['id']))
    {
        $sql = "SELECT * FROM pedidos_resposta WHERE id_empresa =".$_SESSION['id']." AND id = ".$_GET['id'];
    }
    $stmt = $dbh->prepare($sql); //statement
    $stmt->execute(); //executa a instrução SQL
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC); //pega os dados da instrução SQL

    echo '  <div class="d-grid justify-content-center">
                <form name="form2" action="actionresposta.php?';
    if(isset($_SESSION['usernameCli'])){
        echo 'id_cliente='.$_SESSION['id'].'&id_empresa='.$dadosPedido['id_empresa'].'&id_pedido='.$_GET['id'];
    }
    echo '          " method="post" class="form-style">
                    <h1 class="d-grid justify-content-center mb-5">Conversa sobre o Pedido: ';
                        echo $_GET['id'];    
    echo '          </h1>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Por favor, descreva." name="descricao" style="height: 200px" maxlength="500"></textarea>
                        <label for="descricao">Descrição</label>
                    </div>

                    <div class="d-grid justify-content-center my-3">
                        <input class="btn btn-primary" type="submit" value="Enviar">
                    </div>
                </form>
            </div>';

    include './shared/footer.php'
?>