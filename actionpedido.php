<?php
include_once("conexao.php");

$dbh = DBConnection::get();

if ($_SERVER["REQUEST_METHOD"] == "POST" && (!isset($_GET['acao']) && $_GET['acao'] != 'edit')) {
  $sth = $dbh->prepare('INSERT INTO pedido(`titulo`, `descricao`, `categorias`) VALUES(:titulo, :descricao, :categorias)');

  $_POST['categorias'] = implode("," , $_POST['categorias']);

  $sth->bindParam(':titulo', $_POST['titulo']);
  $sth->bindParam(':descricao', $_POST['descricao']);
  $sth->bindParam(':categorias', $_POST['categorias']);
  
  $sth->execute();
}
else{
  $sth = $dbh->prepare('UPDATE pedido SET titulo = :titulo, descricao = :descricao, categorias = :categorias WHERE id = :id');

  $_POST['categorias'] = implode("," , $_POST['categorias']);

  $sth->bindParam(':titulo', $_POST['titulo']);
  $sth->bindParam(':descricao', $_POST['descricao']);
  $sth->bindParam(':categorias', $_POST['categorias']);
  $sth->bindParam(':id', $_GET['id']);
  
  $sth->execute();
}
?>