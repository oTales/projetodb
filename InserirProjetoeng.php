<?php
include_once './controllers/funcoes.php';
if (isset($_POST['pdfUpload']) || isset($_POST['descricao']) || isset($_POST['construcao'])) {
  // Recebendo a data do input (exemplo: '22/05/2023')
 $construcao =  $_POST['construcao'];
 $pdfUpload =   $_POST['pdfUpload'];
 $descricao =  $_POST['descricao'];


  if (empty($construcao) || empty($pdfUpload) || empty($descricao)) {
    echo "Por favor, preencha todos os campos";
    exit;
  } else {
    echo '<script> alert("Projeto adicionado com sucesso") </script>';
    inserirnalista('projetosEngenharia', 'idconstrucao,ProjetosEngenharia,comentario', "'$construcao','$pdfUpload','$descricao'");
    header('Refresh : ./Projetos.php');
    
  }
}
?>