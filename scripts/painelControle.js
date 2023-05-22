const funcionario = document.getElementById('funcionario');
const condominio = document.getElementById('condominio');
const construcao = document.getElementById('construcao');
const predios = document.getElementById('predios');
const tabelaFuncionario = document.getElementById('tabelaFuncionario');
const tabelaPredios = document.getElementById('tabelaPredios');
const tabelaCondominio = document.getElementById('tabelaCondominio');
const tabelaConstrucoes = document.getElementById('tabelaConstrucoes');

funcionario.addEventListener('click', ()=>{
  if(tabelaFuncionario.classList.contains('hidden')){
    tabelaFuncionario.classList.remove('hidden');
    tabelaPredios.classList.add('hidden');
    tabelaCondominio.classList.add('hidden');
    tabelaConstrucoes.classList.add('hidden');
  }
})
condominio.addEventListener('click', ()=>{
  if(tabelaCondominio.classList.contains('hidden')){
    tabelaFuncionario.classList.add('hidden');
    tabelaPredios.classList.add('hidden');
    tabelaCondominio.classList.remove('hidden');
    tabelaConstrucoes.classList.add('hidden');
  }
})
construcao.addEventListener('click', ()=>{
  if(tabelaConstrucoes.classList.contains('hidden')){
    tabelaFuncionario.classList.add('hidden');
    tabelaPredios.classList.add('hidden');
    tabelaCondominio.classList.add('hidden');
    tabelaConstrucoes.classList.remove('hidden');
  }
})
predios.addEventListener('click', ()=>{
  if(tabelaPredios.classList.contains('hidden')){
    tabelaFuncionario.classList.add('hidden');
    tabelaPredios.classList.remove('hidden');
    tabelaCondominio.classList.add('hidden');
    tabelaConstrucoes.classList.add('hidden');
  }
})