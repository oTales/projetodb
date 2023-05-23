<!DOCTYPE html>
<?php
include_once './controllers/funcoes.php';

if (isset($_POST['enderecoPredio']) || isset($_POST['statusConstrucao']) || isset($_POST['dataInicio']) || isset($_POST['dataTermino'])){
  // Recebendo a data do input (exemplo: '22/05/2023')
  $dataInicio = $_POST['dataInicio'];
  $dataTermino = $_POST['dataTermino'];
  $postStatusConstrucao = $_POST['statusConstrucao'];
  
  $dataFormatadaInicio = date('Y-m-d', strtotime($dataInicio));
  $dataFormatadaTermino = date('Y-m-d', strtotime($dataTermino));


  if (empty($dataFormatadaTermino) || empty($dataFormatadaInicio) ||  empty($postStatusConstrucao)) {
    echo "Por favor, preencha todos os campos";
    exit;
  } else {
    inserirnalista('construcao', 'idstatusconstrucao,DataInicio,DataTermino', "$postStatusConstrucao,$dataFormatadaInicio,$dataFormatadaTermino");
  }
}

?>


<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-900">

  <!-- inserir predio -->
  <div class="flex items-center justify-center h-screen">
    <form method="post" action=""class="bg-white rounded px-8 pt-6 pb-8 mb-4">
      <a href="./paineldeControle.php" class="border-b border-gray-500 hover:border-gray-700">Ir para o Painel de Controle</a>
      <h3>Nova Construção</h3>
      <h1></h1>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Data Inicio
        </label>
        <input type="date" name="dataInicio" id="dataInicio" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="mb-6">
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Data Terminio
        </label>
        <input type="date" name="dataTermino" id="dataTermino" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Status Construcao
        </label>
        <select name="statusConstrucao"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
           placeholder="escolha a data">

          <?php
          $buscarItens = mostrarItem('*', 'statusconstrucao');
          foreach ($buscarItens as $item) {
            $idstatusConstrucao = $item->idstatusConstrucao;
            $statusConstrucao = $item->statusConstrucao;
            ?>
            <option value="<?php echo $idstatusConstrucao ?>"><?php echo $statusConstrucao ?></option>

          <?php } ?>
        </select>
      </div>
      <div class="flex items-center justify-between">
        <button
        type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="button">
          Entrar
        </button>
      </div>
    </form>
  </div>
</body>

</html>