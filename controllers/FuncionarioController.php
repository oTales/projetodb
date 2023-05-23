<?php
include_once './funcoes.php';

date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date("Y-m-d");


if (isset($_POST['idsetorFuncionario']) || isset($_POST['nome']) || isset($_POST['idCondominio']) || isset($_POST['genero']) || isset($_POST['dataNascimento']) || isset($_POST['sobrenome'])){
  $idsetorFuncionario = $_POST['idsetorFuncionario'];
  $nome = $_POST['nome'];
  $genero = $_POST['genero'];
  $idCondominio = $_POST['idCondominio'];
  $sobrenome = $_POST['sobrenome'];	
  $dataNascimento = $_POST['dataNascimento'];

  $dataFormatadaNasc = date('Y-m-d', strtotime($dataNascimento));

  if (empty($nome) || empty($genero) || empty($idCondominio) || empty($idsetorFuncionario) || empty($sobrenome) || empty($dataFormatadaNasc)) {
    echo "Por favor, preencha todos os campos";
    var_dump($nome,$genero,$idCondominio,$sobrenome,$dataFormatadaNasc,$idsetorFuncionario);
    exit;
  } else {
    echo '<script>alert("Funcionario Cadastrado com sucesso");</script>';
    header("Refresh:1; url=../paineldeControle.php");
    InserirFuncionario('idgenero,nome,sobrenome,DataNascimento',"$genero,'$nome','$sobrenome','$dataFormatadaNasc'",'idCondominio,idsetorFuncionario,Admissao', "$idCondominio,$idsetorFuncionario,$dataAtual");
  }
}

?>