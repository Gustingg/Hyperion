<?php
    require_once "conexao.php";
    session_start();
    $_SESSION['pageTitle'] = 'Pedidos';
    include './shared/header.php';	
    $dbh = DBConnection::get();

    echo "<div class='d-grid justify-content-center'>
    <div class='row mb-4'><div class='col'><h2>Pedidos</h2></div><div class='col'><a href='pedido.php' class='btn btn-success float-end'>Novo Pedido</a></div></div>";
    if (isset($_SESSION['status']) && $_SESSION['status'] == 1){
        echo "<div class='alert alert-success' role='alert' style='color: green'>
                ". $_SESSION['msg'] ."
            </div>";
        unset($_SESSION['status']);
        unset($_SESSION['msg']);
    }
    else if(isset($_SESSION['status'])){
        echo "<div class='alert alert-danger' role='alert' style='color: red'>
                ". $_SESSION['msg'] ."
            </div>";
        unset($_SESSION['status']);
        unset($_SESSION['msg']);
    }
    if(isset($_SESSION['usernameCli'])){
        $sql = "SELECT * FROM pedido";
    }
    else {
        $sql = "SELECT * FROM pedido WHERE id_usuario = ".$_SESSION['id'];
    }
    $stmt = $dbh->prepare($sql); //statement
    $stmt->execute(); //executa a instrução SQL
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC); //pega os dados da instrução SQL

    echo "<table class='table table-striped table-hover' style='min-width: 75rem;'><tr><td width='30'>id</td><td>Título</td><td>Descrição</td>
    <td>Categorias</td>";
    if (isset($_SESSION['usernameEmp'])){
        if (!empty($dados)){
            foreach ($dados as $registro) {
                echo "<td>Ações</td><td> </td></tr>
                      <tr><td>".$registro['id']."</td>";
                echo "<td>".$registro['titulo']."</td>";
                echo "<td>".$registro['descricao']."</td>";
                echo "<td>".$registro['categorias']."</td>
                <td><a class='btn btn-secondary' href='pedido.php?acao=editar&id=".$registro['id']."'><i class='bi bi-pencil-square'></i></a> 
                <a class='btn btn-danger' onclick='confirmDelete(".$registro['id'].")'><i class='bi bi-trash'></i></a></td></tr>";
            }
        }
        else{
            echo "</tr><tr><td colspan='5'><p style='text-align-last: center;'>Ops... Parece que não temos nenhum pedido ainda.</p></td></tr>";
        }
    }
    else if (isset($_SESSION['usernameCli'])){
        if (!empty($dados)){
            foreach ($dados as $registro) {
                echo "<tr><td>".$registro['id']."</td>";
                echo "<td>".$registro['titulo']."</td>";
                echo "<td>".$registro['descricao']."</td>";
                echo "<td>".$registro['categorias']."</td>";
            }
        }
        else{
            echo "<tr><td colspan='5'><p style='text-align-last: center;'>Ops... Parece que não temos nenhum pedido ainda.</p></td></tr>";
        }
    }
    else{
        echo "<tr><td colspan='5'><p style='text-align-last: center;'>Ops... Parece que você ainda não está logado.</p></td></tr>";
    }
    echo "</table>
    </div>";

    echo'
    <script>
        function confirmDelete(id){
            if (confirm("Você realmente deseja excluir o registro de número " + id + " ?")) {
                window.location.href="actionpedido.php?id="+id+"&acao=del";
                alert("Pedido excluido com sucesso!");
            }
        }
    </script>';

    include './shared/footer.php'
?>