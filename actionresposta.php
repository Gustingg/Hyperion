<?php
include_once("conexao.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $dbh = DBConnection::get();
    $sth = $dbh->prepare('INSERT INTO pedidos_resposta(`id_cliente`,`id_empresa`,`id_pedido`,`resposta`) VALUES(:id_cliente,:id_empresa,:id_pedido,:resposta)')

    $sth->bindParam(':id_cliente', $_GET['id_cliente']);
    $sth->bindParam(':id_empresa', $_GET['id_empresa']);
    $sth->bindParam(':id_pedido', $_GET['id_pedido']);
    $sth->bindParam(':resposta', $_POST['resposta']);

    $sth->execute();

    header('location: /Hyperion/resposta.php');
}
?>