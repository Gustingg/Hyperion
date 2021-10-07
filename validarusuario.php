<?php
session_start();
require_once "conexao.php";

if(isset($_POST['email']) && isset($_POST['senha'])){
    $dbh = DBConnection::get();

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = $dbh->prepare("Select * from cliente where email='$email' and senha='$senha'");
    $sql->execute();
    
    $result = $sql->fetch();
    if($result != null){
        $_SESSION['username']=$result['nomeRazaoSocial'];
        header('Location: pedido.php');
    }
    else{
        $sql = $dbh->prepare("Select * from empresa where email='$email' and senha='$senha'");
        $sql->execute();

        $result = $sql->fetch();
        $_SESSION['username']=$result['razaosocial'];
        header('Location: pedidosdosclientes.php');
    }
}else {
    echo "campos não ok";
}
?>

