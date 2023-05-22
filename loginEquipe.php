<!DOCTYPE html>
<?php
include_once './controllers/funcoes.php';

if (isset($_POST['nome']) || isset($_POST['senha']) || isset($_POST['setor'])) {
  $senha = $_POST['senha'];
  $nome = $_POST['nome'];
  $setor = $_POST['setor'];
  if (empty($senha) || empty($nome) || empty($setor)) {
    echo "Por favor, preencha todos os campos";

    exit;
  }else{
    verificacao($setor);
  }
  
}


?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="items-center grid grid-cols-2">
    <form method="post" action="" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
      <h3>Login do</h3>
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
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          senha
        </label>
        <input name="senha"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password" type="password" placeholder="******************" />
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Seu Setor
        </label>
        <select name="setor"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          type="text" placeholder="escolha seu setor">
          
        <?php
    $buscarItens = mostrarItem('*','setorFuncionario');
    foreach ($buscarItens as $item) {
        $idsetorFuncionario = $item->idsetorFuncionario;
        $setorFuncionario = $item->setorFuncionario;
      ?>
     <option value="<?php echo $idsetorFuncionario?>"><?php echo $setorFuncionario?></option>
     
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