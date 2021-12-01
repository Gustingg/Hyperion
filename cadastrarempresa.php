<?php
include_once("conexao.php");

$dbh = DBConnection::get();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sth = $dbh->prepare('INSERT INTO empresa(`razaosocial`, `cnpj`, `endereco`, `email`, `telefone`, `senha`) VALUES(:razaosocial, :cnpj, :endereco, :email, :telefone, :senha)');

  $sth->bindParam(':razaosocial', $_POST['razaosocial']);
  $sth->bindParam(':cnpj', $_POST['cnpj']);
  $sth->bindParam(':endereco', $_POST['endereco']);
  $sth->bindParam(':email', $_POST['email']);
  $sth->bindParam(':telefone', $_POST['telefone']);
  $sth->bindParam(':senha', $_POST['senha']);
 

  $sth->execute();
  header('Location: entrar.php');
}
?>