<!DOCTYPE html>
<?php
include_once './controllers/funcoes.php';

if (isset($_POST['cidade']) || isset($_POST['nomeCondominio']) || isset($_POST['UF']) || isset($_POST['Bairro']) || isset($_POST['numero']) || isset($_POST['Rua'])) {
  $cidade = $_POST['cidade'];
  $nomeCondominio = $_POST['nomeCondominio'];
  $UF = $_POST['UF'];
  $numero = $_POST['numero'];
  $Bairro = $_POST['Bairro'];
  $Rua = $_POST['Rua'];

  if (empty($cidade) || empty($nomeCondominio) || empty($UF) || empty($numero) || empty($Bairro) || empty($cidade) || empty($Rua)) {
    echo "Por favor, preencha todos os campos";
    exit;
  }else{
  inserirnalista('condominio', 'NomeCondominio,Rua,UF,Bairro,numero,cidade', [$nomeCondominio, $Rua, $UF, $Bairro, $numero, $cidade]);
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

  <div class="items-center grid grid-cols-2">
    <form method="post" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
      <h3>Inserir</h3>
      <br />
      <h1>Novo Condominio</h1>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Nome do Condominio
        </label>
        <input
          name="nomeCondominio"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="username" name="nome" type="text" placeholder="Username" />
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Rua
        </label>
        <input name="Rua"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password" type="text" placeholder="******************" />
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
         UF
        </label>
        <input name="UF"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password" type="text" placeholder="******************" />
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
         cidade
        </label>
        <input name="cidade"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password" type="text" placeholder="******************" />
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Bairro
        </label>
        <input name="Bairro"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password" type="text" placeholder="******************" />
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          numero
        </label>
        <input name="numero"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password" type="password" placeholder="******************" />
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