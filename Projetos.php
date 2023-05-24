<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once './controllers/funcoes.php' ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Engenheiro - Meus Projetos</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-slate-900">
  <header class="bg-blue-500 py-4">
   
    

    <div class="flex justify-around container mx-auto px-4">
       <a class="text-white mr-2 items-center"  href="./loginEquipe.php"><img src="./img/arrow.svg" alt="">Voltar</a> 
      <h1 class="text-white text-2xl font-semibold">Bem vindo á sessão de projetos</h1>
      <div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="abrirModal">Projeto
          Engenharia <img src="./img/plus2.svg" alt=""></button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="abrirModalArq">Projeto
          Arquitetura <img src="./img/plus2.svg" alt=""></button>
      </div>

    </div>
  </header>
  <main class="flex gap-4 flex-wrap items-center mx-auto px-4 py-8">

    <?php
    $buscarItens = mostrarItem('   tc.idconstrucao,
    ta.idconstrucao,
    tc.DataInicio,
    tc.DataTermino,
    ta.idArquiteto,
    tc.NomeConstrucao,
    tpa.idconstrucao,
    ta.CAU,
    ta.idcliente,
    tcl_arq.idcliente,
    tcl_arq.Nome AS NomeArquiteto,
    te.idcliente,
    te.idengenheiro,
    te.CREA,
    tpa.ProjetosArquitetura,
    tpe.ProjetosEngenharia,
    tcl_eng.idcliente,
    tcl_eng.Nome AS NomeEngenheiro', 'construcao AS tc
    INNER JOIN arquiteto AS ta ON tc.idconstrucao = ta.idconstrucao
    INNER JOIN projetosarquitetura AS tpa ON tc.idconstrucao = tpa.idconstrucao
    INNER JOIN cliente AS tcl_arq ON tcl_arq.idcliente = ta.idcliente
    INNER JOIN projetosengenharia AS tpe ON tc.idconstrucao = tpe.idconstrucao
    INNER JOIN engenheiro AS te ON tc.idconstrucao = te.idengenheiro
    INNER JOIN cliente AS tcl_eng ON tcl_eng.idcliente = te.idcliente;
');
    if (empty($buscarItens)) {
    } else {
      foreach ($buscarItens as $item) {
        $NomeConstrucao = $item->NomeConstrucao;
        $projetoEngenharia = $item->ProjetosEngenharia;
        $projetoArquitetura = $item->ProjetosArquitetura;
        $nomeArquiteto = $item->NomeArquiteto;
        $nomeEngenheiro = $item->NomeEngenheiro;
        $CAU = $item->CAU;
        $CREA = $item->CREA;
        $DataTermino = $item->DataTermino;
        $DataInicio = $item->DataInicio;
        ?>
        <!-- Projeto 2 -->
        <div class="w-[800px] items-center justify-center m-auto bg-white rounded-lg shadow-md">
          <div class="py-6 px-4">
            <h3 class="text-lg font-semibold">
              <?php echo $NomeConstrucao ?>
            </h3>
            <div>
              <p class="text-black mt-2">Arquiteto:
                <?php echo "$nomeArquiteto : $CAU Engenheiro: $nomeEngenheiro : $CREA" ?>
              </p><br>
              <p>Data de Inicio:
                <?php echo $DataInicio ?>
              </p>
              <p>Data de Termino:
                <?php echo $DataTermino ?>
              </p>
            </div>

          </div>
          <div class="justify-between flex px-4 py-3 bg-gray-100">
            <a href="<?php echo $projetoEngenharia ?>" class="text-blue-500 font-semibold" download>Projeto Engenharia</a>
            <a href="<?php echo $projetosArquitetura ?>" class="text-blue-500 font-semibold" download>Projeto
              Arquitetura</a>
          </div>
        </div>
        </div>
      <?php }
    } ?>
  </main>
  <!-- Botão para abrir o modal -->

  <!-- Modal Engenharia -->
  <div id="myModal" class="modal hidden fixed w-full h-full top-0 left-0 flex items-center justify-center">

    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-1/2 mx-auto rounded shadow-lg z-50 overflow-y-auto">
      <!-- Conteúdo do modal -->
      <div class="modal-content py-4 text-left px-6">
        <!-- Título do modal -->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Adicionar Projeto de Engenharia</p>
          <button class="modal-close cursor-pointer z-50" id="fecharModal">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
              viewBox="0 0 18 18">
              <path
                d="M18 1.5l-1.5-1.5-7.5 7.5-7.5-7.5-1.5 1.5 7.5 7.5-7.5 7.5 1.5 1.5 7.5-7.5 7.5 7.5 1.5-1.5-7.5-7.5z" />
            </svg>
          </button>
        </div>

        <!-- Campos do modal -->
        <div class="mb-4">
          <form action="./inserirProjetoeng.php" method="post">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nome-engenheiro">
              Em qual construcao vai o projeto?
            </label>
            <select name="construcao"
              class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
              placeholder="escolha a data">

              <?php
              $buscarItens = mostrarItem('*', 'construcao');
              foreach ($buscarItens as $item) {
                $idconstrucao = $item->idconstrucao;
                $construcao = $item->NomeConstrucao;
                ?>
                <option value="<?php echo $idconstrucao ?>"><?php echo $construcao ?></option>

              <?php } ?>
            </select>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="descricao">
                Descrição
              </label>
              <textarea name="descricao"
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="descricao" placeholder="Descrição"></textarea>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="pdf-upload">
                Upload do PDF
              </label>
              <input name="pdfUpload"
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="pdf-upload" type="file">
            </div>

            <!-- Botão de enviar -->
            <div class="flex justify-end pt-2">

              <button type="submit"
                class="px-4 bg-blue-500 p-3 rounded-lg text-white font-bold hover:bg-blue-700">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  <!-- Modal Arquitetura-->
  <div id="myModalArq" class="modal hidden fixed w-full h-full top-0 left-0 flex items-center justify-center">

    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-1/2 mx-auto rounded shadow-lg z-50 overflow-y-auto">
      <!-- Conteúdo do modal -->
      <div class="modal-content py-4 text-left px-6">
        <!-- Título do modal -->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Adicionar Projeto de Arquittura</p>
          <button class="modal-close cursor-pointer z-50" id="fecharModalArq">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
              viewBox="0 0 18 18">
              <path
                d="M18 1.5l-1.5-1.5-7.5 7.5-7.5-7.5-1.5 1.5 7.5 7.5-7.5 7.5 1.5 1.5 7.5-7.5 7.5 7.5 1.5-1.5-7.5-7.5z" />
            </svg>
          </button>
        </div>

        <!-- Campos do modal -->
        <div class="mb-4">
          <form action="./inserirProjetoArq.php" method="post">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nome-engenheiro">
              Em qual construcao vai o projeto?
            </label>
            <select name="construcao"
              class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
              placeholder="escolha a data">

              <?php
              $buscarItens = mostrarItem('*', 'construcao');
              foreach ($buscarItens as $item) {
                $idconstrucao = $item->idconstrucao;
                $construcao = $item->NomeConstrucao;
                ?>
                <option value="<?php echo $idconstrucao ?>"><?php echo $construcao ?></option>

              <?php } ?>
            </select>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="descricao">
                Descrição
              </label>
              <textarea name="descricao"
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="descricao" placeholder="Descrição"></textarea>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="pdf-upload">
                Upload do PDF
              </label>
              <input name="pdfUpload"
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="pdf-upload" type="file">
            </div>

            <!-- Botão de enviar -->
            <div class="flex justify-end pt-2">

              <button type="submit"
                class="px-4 bg-blue-500 p-3 rounded-lg text-white font-bold hover:bg-blue-700">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

  <script src="./scripts/inserir.js"></script>

</body>

</html>