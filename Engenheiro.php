<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Engenheiro - Meus Projetos</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
  <header class="bg-blue-500 py-4">
    <div class="container mx-auto px-4">
      <h1 class="text-white text-2xl font-semibold">Engenheiro</h1>
    </div>
  </header>

  <main class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-4">Meus Projetos</h2>

    <div class="flex flex-col space-y-4">
      <!-- Projeto 1 -->
      <div class="relative bg-white rounded-lg shadow-md">
        <div class="py-6 px-4">
          <h3 class="text-lg font-semibold">Projeto 1</h3>
          <p class="text-gray-600 mt-2">Descrição do projeto 1.</p>
        </div>
        <div class="px-4 py-3 bg-gray-100">
          <a href="#" class="text-blue-500 font-semibold">Download</a>
        </div>
      </div>

      <!-- Projeto 2 -->
      <div class="relative bg-white rounded-lg shadow-md">
        <div class="py-6 px-4">
          <h3 class="text-lg font-semibold">Projeto 2</h3>
          <p class="text-gray-600 mt-2">Descrição do projeto 2.</p>
        </div>
        <div class="px-4 py-3 bg-gray-100">
          <a href="#" class="text-blue-500 font-semibold">Download</a>
        </div>
      </div>
    </div>

    <!-- Formulário de Registro de Projeto -->
    <div class="mt-8">
      <h2 class="text-2xl font-semibold mb-4">Registrar Novo Projeto</h2>
      <form class="bg-white rounded-lg shadow-md p-4">
        <div class="mb-4">
          <label for="nome" class="block text-gray-700 font-semibold">Nome do Projeto</label>
          <input type="text" id="nome" name="nome" class="border border-gray-300 rounded-lg px-4 py-2 w-full">
        </div>
        <div class="mb-4">
          <label for="descricao" class="block text-gray-700 font-semibold">Descrição</label>
          <textarea id="descricao" name="descricao"
            class="border border-gray-300 rounded-lg px-4 py-2 w-full"></textarea>
        </div>
        <div>
          <button type="submit" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg">Registrar
            Projeto</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>