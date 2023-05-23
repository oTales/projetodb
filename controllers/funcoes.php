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

function inserirnalista($nometabela, $camposTabela, $valores)
{
  $conn = conectar();
  $valoresArray = explode(',', $valores); // Converter a string de valores em uma array
  $placeholders = rtrim(str_repeat('?,', count($valoresArray)), ',');
  $sql = "INSERT INTO $nometabela ($camposTabela) VALUES ($placeholders)";
  $lista = $conn->prepare($sql);
  $lista->execute($valoresArray);
  if ($lista->rowCount() > 0) {
    return 'Cadastrado';
  } else {
    return 'Vazio';
  }
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
function excluirRegistro($id)
{
  $conn = conectar();

  // Crie a consulta SQL DELETE
  $sql = "DELETE FROM funcionario WHERE idfuncionario = $id"; // Substitua "tabela" pelo nome correto da tabela no banco de dados

  if ($conn->query($sql) === TRUE) {
    echo "Registro excluído com sucesso.";
  } else {

    echo "Erro ao excluir o registro: " . $conn->errorInfo();
  }
}

function mostrarItem($campos,$nometabela){
   $conn = conectar();
   $lista = $conn->query("SELECT $campos FROM $nometabela");
   $lista -> execute();
   if($lista->rowCount() > 0){
      return $lista->fetchAll(PDO::FETCH_OBJ);
      
   }else{
      return 'Vazio';
   }
}
?>