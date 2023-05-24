<!DOCTYPE html>
<?php
include_once './controllers/funcoes.php';

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-900">
  
  <ul class="flex gap-2 justify-around text-white items-center h-10 bg-slate-700 ">
    <li><a class="text-white mr-2 items-center"  href="./loginEquipe.php"><img src="./img/arrow.svg" alt="">Voltar</a> </li>
    <li class="cursor-pointer flex items-center" id="funcionario">Funcionario <a class="text-gray-200 ml-1 "
        href="./inserirFuncionario.php"><img
          class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
          src="./img/plus.svg" alt=""></a></li>
    <li class="cursor-pointer flex items-center" id="condominio">Condominios <a class="text-gray-200 ml-1"
        href="./inserirCondominio.php"><img
          class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
          src="./img/plus.svg" alt=""></a></li>
    <li class="cursor-pointer flex items-center" id="construcao">Construcoes <a class="text-gray-200 ml-1"
        href="./inserirConstrucao.php"><img
          class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
          src="./img/plus.svg" alt=""></a></li>
    <li class="cursor-pointer flex items-center" id="predios"> Predios <a class="text-gray-200 ml-1"
        href="./inserirPredio.php"><img
          class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
          src="./img/plus.svg" alt=""></a> </li>
  </ul>
  <!-- TABELA FUNCIONARIO -->
  <table id="tabelaFuncionario"
    class="max-w-[1000px] mt-40 w-full items-center justify-center m-auto text-sm text-left text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-700 text-white">
      <a href="./index.html"><img src="./img/arrow" alt=""></a>
      <th scope="col" class="px-6 py-3" scope="col" class="px-6 py-3">idFuncionario</th>
      <th scope="col" class="px-6 py-3" scope="col" class="px-6 py-3">Funcionário</th>
      <th scope="col" class="px-6 py-3" scope="col" class="px-6 py-3">Setor</th>
      <th scope="col" class="px-6 py-3" scope="col" class="px-6 py-3">Construção que Faz Parte</th>
      <th scope="col" class="px-6 py-3" scope="col" class="px-6 py-3">Acoes</th>
    </thead>

    <?php
    $buscarItens = mostrarItem('tc.idcliente,
tc.nome,
tco.NomeCondominio,
tf.idcliente,
tf.idsetorFuncionario,
tf.idcondominio,
tsf.setorFuncionario,
tco.NomeCondominio,
tf.idFuncionario,
tco.idcondominio,
tsf.idsetorFuncionario', 'funcionario as tf 
INNER JOIN cliente as tc ON tf.idcliente = tc.idcliente
INNER JOIN setorfuncionario as tsf ON tf.idsetorFuncionario = tsf.idsetorFuncionario
INNER JOIN condominio as tco on tf.idcondominio = tco.idcondominio');
    if (empty($buscarItens)) {
    } else {
      foreach ($buscarItens as $item) {
        $idFuncionario = $item->idFuncionario;
        $nome = $item->nome;
        $idSetorFuncionario = $item->idsetorFuncionario;
        $nomeCondominio = $item->NomeCondominio;
        $setorFuncionario = $item->setorFuncionario;


        ?>
        <tr>
          <td class="px-6 py-4">
            <?php echo $idFuncionario ?>
          </td>
          <td class="px-6 py-4">
            <?php echo $nome ?>
          </td>
          <td class="px-6 py-4">
            <?php echo $setorFuncionario ?>
          </td>
          <td class="px-6 py-4" class="px-6 py-4">
            <?php echo $nomeCondominio ?>
          </td>
          <td>

            <form method="POST">
              <input type="hidden" name="idFuncionario" value="<?php echo $idFuncionario; ?>">
              <button type="submit" name="deleteButton" value="Excluir">
                <img src="./img/lixeira.svg" alt="">
              </button>
            </form>
          </td>
        </tr>
      <?php }
    } ?>
    <?php


    if (isset($_POST['deleteButton'])) {
      $idFuncionario = $_POST['idFuncionario']; // Certifique-se de ter o valor correto do ID do funcionário aqui
      excluirRegistro('funcionario','idfuncionario',$idFuncionario);
     header("Refresh:1; url=./paineldeControle.php");
    }

    ?>
  </table>

  <!-- TABELA CONDOMINIO -->
  <table
    class="max-w-[1000px] mt-40 w-full items-center justify-center m-auto text-sm text-left text-gray-500 dark:text-gray-400 hidden"
    id="tabelaCondominio" class="hidden">
    <a class="" href="./inserirCondominio.php"></a>
    <thead class="text-xs text-gray-700 uppercase bg-gray-700 text-white">
      <th scope="col" class="px-6 py-3">Nome do Condominio</th>
      <th scope="col" class="px-6 py-3">Rua/Numero</th>
      <th scope="col" class="px-6 py-3">Bairro</th>
      <th scope="col" class="px-6 py-3">UF</th>
      <th scope="col" class="px-6 py-3">Num. Predios</th>
      <th scope="col" class="px-6 py-3">
        ACOES
      </th>
    </thead>

    <?php
    $buscarItens = mostrarItem('condominio.Rua,condominio.UF,condominio.Bairro,Condominio.numero,condominio.idCondominio,
    condominio.nomeCondominio,
    COUNT(predio.idPredio) AS totalPredios', 'condominio
    LEFT JOIN predio ON condominio.idCondominio = predio.idCondominio
GROUP BY
    condominio.idCondominio,
    condominio.nomeCondominio;');
    foreach ($buscarItens as $item) {
      $idCondominio = $item->idCondominio;
      $nomeCondominio = $item->nomeCondominio;
      $Rua = $item->Rua;
      $UF = $item->UF;
      $Bairro = $item->Bairro;
      $numero = $item->numero;
      $totalPredios = $item->totalPredios;
      ?>
      <tr>
        <td class="px-6 py-4">
          <?php echo $nomeCondominio ?>
        </td>

        <td class="px-6 py-4">
          <?php echo $Rua . "/" . $numero ?>
        </td>

        <td class="px-6 py-4">
          <?php echo $Bairro ?>
        </td>

        <td class="px-6 py-4">
          <?php echo $UF ?>
        </td>

        <td class="px-6 py-4">
          <?php echo $totalPredios ?>
        </td>

        <td class="px-6 py-4">

          <form method="POST">
            <input type="hidden" name="idCondominio" value="<?php echo $idCondominio; ?>">
            <button type="submit" name="deleteCondominio" value="Excluir">
              <img src="./img/lixeira.svg" alt="">
            </button>
          </form>
        </td>
      </tr>
    <?php } ?>
    <?php


    if (isset($_POST['deleteCondominio'])) {
      $idCondominio = $_POST['idCondominio']; // Certifique-se de ter o valor correto do ID do funcionário aqui
      excluirRegistro('condominio','idcondominio',$idCondominio);
     header("Refresh:1; url=./paineldeControle.php");
    }

    ?>
  </table>
  <!-- TABELA CONSTRUCOES -->
  <table
    class="max-w-[1000px] mt-40 w-full items-center justify-center m-auto text-sm text-left text-gray-500 dark:text-gray-400 hidden"
    id="tabelaConstrucoes">
    <a class="" href="./inserirConstrucao.php"></a>
    <thead class="text-xs text-gray-700 uppercase bg-gray-700 text-white">
      <th scope="col" class="px-6 py-3">idConstrucao</th>
      <th scope="col" class="px-6 py-3">Data Inicio</th>
      <th scope="col" class="px-6 py-3">Data de Termino</th>
      <th scope="col" class="px-6 py-3">Status Construcao</th>
      <th scope="col" class="px-6 py-3">Acoes</th>
    </thead>

    <?php
    $buscarItens = mostrarItem('construcao.idconstrucao,construcao.idstatusconstrucao,construcao.DataInicio,construcao.DataTermino,statusconstrucao.idstatusconstrucao,statusconstrucao.statusConstrucao', 'db_construtora.construcao INNER JOIN db_construtora.statusConstrucao ON construcao.idstatusConstrucao = statusconstrucao.idstatusConstrucao');
    foreach ($buscarItens as $item) {
      $idconstrucao = $item->idconstrucao;
      $statusConstrucao = $item->statusConstrucao;
      $DataInicio = $item->DataInicio;
      $DataTerminmo = $item->DataInicio;
      ?>
      <tr>
        <td class="px-6 py-4">
          <?php echo $idconstrucao ?>
        </td>
        <td class="px-6 py-4">
          <?php echo $DataInicio ?>
        </td>
        <td class="px-6 py-4">
          <?php echo $DataTerminmo ?>
        </td>
        <td class="px-6 py-4">
          <?php echo $statusConstrucao;?>
        </td>
        <td class="px-6 py-4">
          <form method="POST">
            <input type="hidden" name="idconstrucao" value="<?php echo $idconstrucao;?>">
              <button type="submit" name="deleteconstrucao" value="Excluir">
                <img src="./img/lixeira.svg" alt="">
              </button>
            </form>
            </td>
            </tr>
          <?php } ?>
          <?php
          if (isset($_POST['deleteconstrucao'])) {
            $idconstrucao = $_POST['idconstrucao']; // Certifique-se de ter o valor correto do ID do funcionário aqui
            excluirRegistro('construcao','idconstrucao',$idconstrucao);
           header("Refresh:1; url=./paineldeControle.php");
          }

          ?>
  </table>
  <!-- TABELA PREDIOS -->
  <table
    class="max-w-[1000px] mt-40 w-full items-center justify-center m-auto text-sm text-left text-gray-500 dark:text-gray-400 hidden"
    id="tabelaPredios">

    <thead class="text-xs text-gray-700 uppercase bg-gray-700 text-white">

      <th scope="col" class="px-6 py-3">idPredio</th>
      <th scope="col" class="px-6 py-3">Condominio que faz parte</th>
      <th scope="col" class="px-6 py-3">Endereco predio</th>
      <th scope="col" class="px-6 py-3">Acoes</th>
    </thead>

    <?php
    $buscarItens = mostrarItem(
      'predio.idpredio,predio.idcondominio,predio.EnderecoPredio,condominio.idcondominio,condominio.NomeCondominio',
      'predio INNER JOIN condominio ON predio.idcondominio = condominio.idcondominio;
'
    );
    foreach ($buscarItens as $item) {
      $idpredio = $item->idpredio;
      $nomeCondominio = $item->NomeCondominio;
      $EnderecoPredio = $item->EnderecoPredio;
      ?>
      <tr>
        <td class="px-6 py-4">
          <?php echo $idpredio ?>
        </td>
        <td class="px-6 py-4">
          <?php echo $nomeCondominio ?>
        </td>
        <td class="px-6 py-4">
          <?php echo $EnderecoPredio ?>
        </td>
        <td class="px-6 py-4">
         <form method="POST">
            <input type="hidden" name="idpredio value="<?php echo $idpredio; ?>>
            <button type="submit" name="deletepredio" value="Excluir">
              <img src="./img/lixeira.svg" alt="">
            </button>
          </form>
          </td>
          </tr>
        <?php } ?>
        <?php


        if (isset($_POST['deletepredio'])) {
          $idpredio = $_POST['idpredio']; // Certifique-se de ter o valor correto do ID do funcionário aqui
          excluirRegistro('predio','idpredio',$idpredio);
         header("Refresh:1; url=./paineldeControle.php");
          
        }

        ?>
  </table>

  <script src="./scripts/painelControle.js"></script>
</body>

</html>