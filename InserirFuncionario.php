<!DOCTYPE html>
<html lang="en">
<?php
include_once './controllers/funcoes.php';
?>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <!-- INSERIR CONSTRUCAO -->
  <div class="items-center grid grid-cols-2">
    <form method="post" action="./controllers/FuncionarioController.php" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
      <a href="./paineldeControle.php" class="border-b border-gray-500 hover:border-gray-700">Ir para o Painel de Controle</a>
      <h3>Inserir</h3>
      <br />
      <h1>Funcionario</h1>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Nome
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="username" name="nome" type="text" placeholder="Username" />
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Sobrenome
        </label>
        <input
        name="sobrenome"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="username" type="text" placeholder="Username" />
      </div>
      <div class="mb-6">
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Data de Nascimento
        </label>
        <input type="date" name="dataNascimento" id="dataTermino" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Seu Setor
        </label>
        <select name="idsetorFuncionario"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          type="text" placeholder="escolha seu setor">

          <?php
          $buscarItens = mostrarItem('*', 'setorFuncionario');
          foreach ($buscarItens as $item) {
            $idsetorFuncionario = $item->idsetorFuncionario;
            $setorFuncionario = $item->setorFuncionario;
            ?>
            <option value="<?php echo $idsetorFuncionario ?>"><?php echo $setorFuncionario ?></option>

          <?php } ?>
        </select>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
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
            <option value="<?php echo $idcondominio ?>"><?php echo$idcondominio .":".$NomeCondominio ?></option>

          <?php } ?>
        </select>


        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Genero
        </label>
        <select name="genero"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          type="text" placeholder="escolha seu setor">

          <?php
          $buscarItens = mostrarItem('*', 'genero');
          foreach ($buscarItens as $item) {
            $idgenero = $item->idgenero;
            $genero = $item->genero;
            ?>
            <option value="<?php echo $idgenero ?>"><?php echo $genero ?></option>

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