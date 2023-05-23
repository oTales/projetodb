<?php
function conectar()
{
  try {
    $conn = new PDO('mysql:host=localhost; charset=utf8mb4; dbname=db_construtora', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "banco esta com problema" . $e->getMessage();
    die();
  }
  return $conn;
}
function InserirFuncionario($camposTabela1, $valoresTabela1, $camposTabela2, $valoresTabela2)
{
  // Insere os dados na tabela de clientes
  $conn = conectar();
  $clienteStmt = $conn->prepare("INSERT INTO cliente ($camposTabela1) VALUES ($valoresTabela1)");
  $clienteStmt->execute();

  // Recupera o ID do cliente inserido
  $clienteId = $conn->lastInsertId();

  // Insere os dados na segunda tabela usando o ID do cliente
  $segundaTabelaStmt = $conn->prepare("INSERT INTO funcionario ($camposTabela2, idcliente ) VALUES ($valoresTabela2, :idcliente)");
  $segundaTabelaStmt->bindParam(':idcliente', $clienteId);
  $segundaTabelaStmt->execute();
}
function inserirnalista($nometabela,$camposTabela,$valores){
   $conn = conectar();
   $lista = $conn->prepare("INSERT INTO $nometabela($camposTabela) VALUES ($valores)");
   $lista -> execute();
   if($lista->rowCount() > 0){
      return 'Cadastrado';
    
   }else{
      return 'Vazio';
   }
  }
function verificacao($setor)
{
  
  switch ($setor) {
    case 1;
      header('Location: ./paineldeControle.php');
      break;
    case 3;
      header('Location: ./financeiro.php');
      break;
    case 5;
      header('Location: ./Engenheiro.php');
      break;
    case 6;
      header('Location: ./Arquiteto');
      break;
  }
}
function excluirRegistro($tabela, $idtabela, $id)
{
  $conn = conectar();

  // Crie a consulta SQL DELETE usando prepared statements
  $sql = "DELETE FROM $tabela  WHERE $idtabela = :id";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);

  if ($stmt->execute()) {
    // Remova a linha de echo abaixo
    // echo '<script>alert("Registro excluído com sucesso");</script>';
    header("Location:./paineldeControle.php");
    exit;
  } else {
    echo "Erro ao excluir o registro: " . $stmt->errorInfo()[2];
  }
}


function mostrarItem($campos, $nometabela)
{
  $conn = conectar();
  $lista = $conn->query("SELECT $campos FROM $nometabela");
  $lista->execute();

  if ($lista->rowCount() > 0) {
    return $lista->fetchAll(PDO::FETCH_OBJ);
  } else {
    return array(); // Retorna um array vazio quando não há resultados
  }
}
?>