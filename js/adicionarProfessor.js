const listaProfs = document.getElementById('listaProfs');
const addProf = document.getElementById('addProf');

addProf.addEventListener("click", () => {
    let repetido = false;

    const profSelect = document.getElementById('professoresOficina');

    const todosCpfs = document.querySelectorAll('.cpfProfs');

    profSelect.classList.remove('is-invalid');

    todosCpfs.forEach(cpf => {
        if(profSelect.value == cpf.value){
            profSelect.classList.add('is-invalid');
            repetido = true;
        }
    });

    if(repetido){
        return
    }

    const novoProf = document.createElement('li');
    novoProf.classList.add('add-professores-view');
    novoProf.innerHTML = `
        <input type="hidden" name="cpfProfs[]" value=${profSelect.value} class="cpfProfs">
        <h4>${profSelect.options[profSelect.selectedIndex].text}</h4>
        <button type="button" class="btn btn-outline-danger remover-prof"><i class="bi bi-trash-fill"></i></button>
    `

    listaProfs.appendChild(novoProf)
})

listaProfs.addEventListener("click", (e) => {
  const btn = e.target.closest(".remover-prof");
  if (btn) {
    const item = btn.closest(".add-professores-view");
    if(item) item.remove();
  }
});