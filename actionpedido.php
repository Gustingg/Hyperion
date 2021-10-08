<?php
include_once("conexao.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['acao'] != 'edit') {
  $dbh = DBConnection::get();
  $sth = $dbh->prepare('INSERT INTO pedido(`titulo`, `descricao`, `categorias`) VALUES(:titulo, :descricao, :categorias)');

  $_POST['categorias'] = implode("," , $_POST['categorias']);

  $sth->bindParam(':titulo', $_POST['titulo']);
  $sth->bindParam(':descricao', $_POST['descricao']);
  $sth->bindParam(':categorias', $_POST['categorias']);

  print_r($_POST['categorias']);
  
  $sth->execute() ? $_SESSION['status'] = 1 : 2;

  if($_SESSION['status'] == 1){
    $_SESSION['msg'] = 'Pedido editado com Sucesso!';
    header('location: /Hyperion/pedidosdosclientes.php');
  }
  else{
    $_SESSION['msg'] = 'Ops... Algo deu errado';
    header('location: /Hyperion/pedidos.php');  
  }    
}
else if($_GET['acao'] == 'del'){ 
  $dbh = DBConnection::get();
  $sth = $dbh->prepare('DELETE FROM pedido WHERE id = :id');
  print_r(id);
  
  $sth->bindParam(':id', $_GET['id']);                     
  
  $sth->execute()? $_SESSION['status'] = 1 : 2;
  $_SESSION['status'] == 1 ? $_SESSION['msg'] = 'Pedido excluido com Sucesso!' :  $_SESSION['msg'] = 'Ops... Algo deu errado';

  if($_SESSION['status'] == 1){
    $_SESSION['msg'] = 'Pedido deletado com Sucesso!';
    header('location: /Hyperion/pedidosdosclientes.php');
  }
  else{
    $_SESSION['msg'] = 'Ops... Algo deu errado';
    header('location: /Hyperion/pedidos.php');  
  }   
}
else{
  $dbh = DBConnection::get();
  $sth = $dbh->prepare('UPDATE pedido SET titulo = :titulo, descricao = :descricao, categorias = :categorias WHERE id = :id');

  $_POST['categorias'] = implode("," , $_POST['categorias']);

  $sth->bindParam(':titulo', $_POST['titulo']);
  $sth->bindParam(':descricao', $_POST['descricao']);
  $sth->bindParam(':categorias', $_POST['categorias']);
  $sth->bindParam(':id', $_GET['id']);
  
  $sth->execute() ? $_SESSION['status'] = 1 : 2;
  $_SESSION['status'] == 1 ? $_SESSION['msg'] = 'Pedido editado com Sucesso!' :  $_SESSION['msg'] = 'Ops... Algo deu errado';

  if($_SESSION['status'] == 1){
    $_SESSION['msg'] = 'Pedido adicionado com Sucesso!';
    header('location: /Hyperion/pedidosdosclientes.php');
  }
  else{
    $_SESSION['msg'] = 'Ops... Algo deu errado';
    header('location: /Hyperion/pedidos.php');  
  }   
}
?>