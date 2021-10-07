<?php
include_once("conexao.php");

$dbh = DBConnection::get();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sth = $dbh->prepare('INSERT INTO pedido(`titulo`, `descricao`, `categorias`) VALUES(:titulo, :descricao, :categorias)');

  $sth->bindParam(':titulo', $_POST['titulo']);
  $sth->bindParam(':descricao', $_POST['descricao']);
  $sth->bindParam(':categorias', $_POST['categorias']);
  
  $sth->execute();
}
?>