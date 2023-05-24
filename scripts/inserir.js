let abrirModal = document.getElementById('abrirModal');
let fecharModal = document.getElementById('fecharModal');
let meuModal = document.getElementById('myModal');

abrirModal.addEventListener('click', () => {
    meuModal.classList.remove('hidden')
});
fecharModal.addEventListener('click', () => {
  meuModal.classList.add('hidden')
});

let abrirModalArq = document.getElementById('abrirModalArq');
let fecharModalArq = document.getElementById('fecharModalArq');
let meuModalArq = document.getElementById('myModalArq');

abrirModalArq.addEventListener('click', () => {
    meuModalArq.classList.remove('hidden')
});
fecharModalArq.addEventListener('click', () => {
  meuModalArq.classList.add('hidden')
});