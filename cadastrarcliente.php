<?php
include_once("conexao.php");

$dbh = DBConnection::get();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sth = $dbh->prepare('INSERT INTO cliente(`nomeRazaoSocial`, `cpfCnpj`, `endereco`, `email`, `senha`, `telefone`) VALUES(:nomeRazaoSocial, :cpfCnpj, :endereco, :email, :senha, :telefone)');

  $sth->bindParam(':nomeRazaoSocial', $_POST['nomeRazaoSocial']);
  $sth->bindParam(':cpfCnpj', $_POST['cpfCnpj']);
  $sth->bindParam(':endereco', $_POST['endereco']);
  $sth->bindParam(':email', $_POST['email']);
  $sth->bindParam(':telefone', $_POST['telefone']);
  $sth->bindParam(':senha', $_POST['senha']);
 

  $sth->execute();
}
?>