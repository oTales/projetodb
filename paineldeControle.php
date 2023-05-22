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
  <ul class="flex gap-2 justify-around text-white">
    <li class="cursor-pointer" id="funcionario">Funcionario</li>
    <li class="cursor-pointer" id="condominio">Condominios</li>
    <li class="cursor-pointer" id="construcao">Construcoes</li>
    <li class="cursor-pointer" id="predios"> Predios</li>
  </ul>
  <!-- TABELA FUNCIONARIO -->
  <table id="tabelaFuncionario" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <th scope="col" class="px-6 py-3" scope="col" class="px-6 py-3">idFuncionario</th>
      <th scope="col" class="px-6 py-3" scope="col" class="px-6 py-3">Funcionário</th>
      <th scope="col" class="px-6 py-3" scope="col" class="px-6 py-3">Setor</th>
      <th scope="col" class="px-6 py-3" scope="col" class="px-6 py-3">Construção que Faz Parte</th>
      <th scope="col" class="px-6 py-3" scope="col" class="px-6 py-3">Acoes</th>
    </thead>

    <?php
    $buscarItens = mostrarItem('funcionario.idFuncionario,
    funcionario.IdCliente,
    cliente.nome AS Nome,
    funcionario.idsetorFuncionario,
    funcionario.idcondominio,
    condominio.nomeCondominio AS Condominio,
    setorfuncionario.setorFuncionario', 'db_construtora.funcionario
    INNER JOIN db_construtora.setorfuncionario ON funcionario.idsetorFuncionario = setorfuncionario.idsetorFuncionario
    INNER JOIN db_construtora.cliente ON funcionario.IdCliente = cliente.idCliente
    INNER JOIN db_construtora.condominio ON funcionario.idcondominio = condominio.idCondominio;
');
    foreach ($buscarItens as $item) {
      $idFuncionario = $item->idFuncionario;
      $idCliente = $item->IdCliente;
      $nome = $item->Nome;
      $idSetorFuncionario = $item->idsetorFuncionario;
      $idCondominio = $item->idcondominio;
      $nomeCondominio = $item->Condominio;
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
          <?php
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteButton'])) {
            // Recupere o ID do item a ser excluído
// Substitua pelo ID correto do item a ser excluído
        
            // Chame a função de exclusão
            excluirRegistro($idFuncionario);
          } ?>
          <form method="POST">

            <button type="submit" name="deleteButton" value="Excluir">
              DELETE
            </button>
          </form>
          UPDATE
        </td>
      </tr>
    <?php } ?>
  </table>

  <!-- TABELA CONDOMINIO -->
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden" id="tabelaCondominio" class="hidden">

    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
          <?php
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteButton'])) {
            // Recupere o ID do item a ser excluído
// Substitua pelo ID correto do item a ser excluído
        
            // Chame a função de exclusão
            excluirRegistro($idCondominio);
          } ?>
          <form method="POST">

            <button type="submit" name="deleteButton" value="Excluir">
              DELETE
            </button>
          </form>
          UPDATE
        </td>
      </tr>
    <?php } ?>
  </table>
  <!-- TABELA CONSTRUCOES -->
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden" id="tabelaConstrucoes" class="hidden">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
          <?php echo $idconstrucao?>
        </td>
        <td class="px-6 py-4">
          <?php echo $DataInicio?>
        </td>
        <td class="px-6 py-4">
          <?php echo $DataTerminmo ?>
        </td>
        <td class="px-6 py-4">
          <?php echo $statusConstrucao ?>
        </td>
        <td class="px-6 py-4">
          <?php
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteButton'])) {
            // Recupere o ID do item a ser excluído
// Substitua pelo ID correto do item a ser excluído
        
            // Chame a função de exclusão
            excluirRegistro($idconstrucao);
          } ?>
          <form method="POST">

            <button type="submit" name="deleteButton" value="Excluir">
              DELETE
            </button>
          </form>
          UPDATE
        </td>
      </tr>
    <?php } ?>
  </table>
  <!-- TABELA PREDIOS -->
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden" id="tabelaPredios" class="hidden">

    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

      <th scope="col" class="px-6 py-3">idPredio</th>
      <th scope="col" class="px-6 py-3">Condominio que faz parte</th>
      <th scope="col" class="px-6 py-3">Endereco predio</th>
      <th scope="col" class="px-6 py-3">Acoes</th>
    </thead>

    <?php
    $buscarItens = mostrarItem('predio.idpredio,predio.idcondominio,predio.EnderecoPredio,condominio.idcondominio,condominio.NomeCondominio', 
    'predio INNER JOIN condominio ON predio.idcondominio = condominio.idcondominio;
');
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
          <?php echo $EnderecoPredio?>
        </td>
        <td class="px-6 py-4">
          <?php
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteButton'])) {
            // Recupere o ID do item a ser excluído
// Substitua pelo ID correto do item a ser excluído
        
            // Chame a função de exclusão
            excluirRegistro($idpredio);
          } ?>
          <form method="POST">

            <button type="submit" name="deleteButton" value="Excluir">
              DELETE
            </button>
          </form>
          UPDATE
        </td>
      </tr>
    <?php } ?>
  </table>

  <script src="./scripts/painelControle.js"></script>
</body>

</html>