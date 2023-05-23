<!DOCTYPE html>
<?php
include_once './controllers/funcoes.php';

if (isset($_POST['enderecoPredio']) || isset($_POST['idCondominio'])) {
  $enderecoPredio = $_POST['enderecoPredio'];
  $idCondominio = $_POST['idCondominio'];
  if (empty($enderecoPredio) || empty($idCondominio)) {
    echo "Por favor, preencha todos os campos";
    exit;
  } else {
    inserirnalista('predio', 'idcondominio,EnderecoPredio', "'$idCondominio','$enderecoPredio'");
    header('Location: ./paineldeControle.php');
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

<body>

  <!-- inserir predio -->
  <div class="items-center grid grid-cols-2">
    <form method="post" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
      <a href="./paineldeControle.php" class="border-b border-gray-500 hover:border-gray-700">Ir para o Painel de Controle</a>
      <h3>Inserir Predio</h3>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Endereco predio
        </label>
        <input name="enderecoPredio"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="username" name="nome" type="text" placeholder="Username" />
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">
          Condominio que faz parte
        </label>
        <select name="idCondominio"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          type="text" placeholder="escolha seu setor">

          <?php
          $buscarItens = mostrarItem('*', 'condominio');
          foreach ($buscarItens as $item) {
            $idcondominio = $item->idcondominio;
            $NomeCondominio = $item->NomeCondominio;
            ?>
            <option value="<?php echo $idcondominio ?>"><?php echo $idcondominio . ":" . $NomeCondominio ?></option>
        
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
    <div class="left-0">
      <img class="object-cover w-screen" src="./img/funcionario.png" alt="" />
    </div>
  </div>
</body>

</html>