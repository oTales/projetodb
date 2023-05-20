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

function verificacao($tabela,$tabela2, $nome, $senha, $setor,$id,$id2)
{
  $conn = conectar();
  $stmt = $conn->prepare("SELECT * FROM $tabela WHERE Nome=? AND senha=? INNER JOIN $tabela2 ON $tabela.$id = $tabela2.$id2 ");
  $stmt->bindParam(1, $nome);
  $stmt->bindParam(2, $senha);
  $stmt->bindParam(3, $setor);
  $stmt->execute();
  switch ($setor) {
    case 1;
      header('Location: ./administracao');
      break;
    case 2;
      header('Location: ./pedreiro');
      break;
    case 3;
      header('Location: ./financeiro');
      break;
    case 4;
      header('Location: ./porteiro');
      break;
    case 5;
      header('Location: ./Engenheiro');
      break;
    case 6;
      header('Location: ./Arquiteto');
      break;
    case 7;
      header('Location: ./Sindico');
      break;
    case 8;
      header('Location: ./segurancas');
      break;
  }
}

?>