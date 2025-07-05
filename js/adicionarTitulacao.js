const btnAdd = document.getElementById('addTitulacao');

const etapa3 = document.getElementById("rEtapa3");
const inputsE3 = etapa3.querySelectorAll('input');

btnAdd.addEventListener("click", () => {
    const tipo = document.getElementById('tipoTitulacaoUsuario');
    const titulo = document.getElementById("titulacaoUsuario");
    const instituicao = document.getElementById("instituicaoUsuario");
    const anoInicio = document.getElementById('anoInicioTituloUsuario');
    const anoConclusao = document.getElementById('anoConclusaoTituloUsuario');

    const viewTitulos = document.getElementById('titulacoes');

    const temInputsVazios = Array.from(inputsE3).some( //Pega todos os inputs vazios com o atributo required
                                input => input.value.trim() === ''
                            );
    if(temInputsVazios){
        invalidarCampos(input => input.value.trim() === '')
        return 
    }

    tipo.classList.remove("is-invalid");
    titulo.classList.remove("is-invalid");
    instituicao.classList.remove("is-invalid");
    anoInicio.classList.remove("is-invalid");
    anoConclusao.classList.remove("is-invalid");

    const novoItem = document.createElement("li");
    novoItem.classList.add("titulacoes-item");
    novoItem.innerHTML = `
        <input type="hidden" name="tipo[]" value="${tipo.value}">
        <input type="hidden" name="titulo[]" value="${titulo.value.trim()}">
        <input type="hidden" name="instituicao[]" value="${instituicao.value.trim()}">
        <input type="hidden" name="anoInicio[]" value="${anoInicio.value.trim()}">
        <input type="hidden" name="anoConclusao[]" value="${anoConclusao.value.trim()}">
        <h3>${tipo.value}: ${titulo.value.trim()}</h3>
        <button type="button" class="btn btn-danger remover-titulacao" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i class="bi bi-x-lg"></i></button> <br>
        <span class="titulacoes-item-instituicao">${instituicao.value.trim()}</span>
        <span>${anoInicio.value.trim()} - ${anoConclusao.value.trim()}</span>
    `

    viewTitulos.appendChild(novoItem);
})

document.querySelector(".titulacoes").addEventListener("click", (e) => {
  const btn = e.target.closest(".remover-titulacao");
  if (btn) {
    btn.parentElement.remove();
  }
});