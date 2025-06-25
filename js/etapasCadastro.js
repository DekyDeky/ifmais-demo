const vEtapa1 = document.getElementById("vEtapa1")
const vEtapa2 = document.getElementById("vEtapa2")
const vEtapa3 = document.getElementById("vEtapa3")
const vEtapa4 = document.getElementById("vEtapa4")

const etapa1 = document.getElementById("rEtapa1");
const etapa2 = document.getElementById("rEtapa2");
const etapa3 = document.getElementById("rEtapa3");
const etapa4 = document.getElementById("rEtapa4");

const inputsE1 = etapa1.querySelectorAll('input');
const inputsE2 = etapa2.querySelectorAll('input');
const inputsE3 = etapa3.querySelectorAll('input');
const inputsE4 = etapa4.querySelectorAll('input');

const proxBtn = document.getElementById('proxBtn');
const antBtn = document.getElementById('antBtn');
const fimBtn = document.getElementById('fimBtn');

const inputsEtapas = [inputsE1, inputsE2, inputsE3, inputsE4];

let etapaAtual = 0

function checarCamposVazios(){
    const temInputsVazios = Array.from(inputsEtapas[etapaAtual]).some( //Pega todos os inputs vazios com o atributo required
                                input => input.hasAttribute('required') && input.value.trim() === ''
                            );
    if(temInputsVazios){
        Array.from(inputsEtapas[etapaAtual]) //Pra cada input nesse array, adiciona a tag bootstrap "is-invalid"
             .filter(input => input.hasAttribute('required') && input.value.trim() === '')
             .forEach(input => {
                 input.classList.add('is-invalid');
             });
        return true //Retorna true que há campos inválidos
    }else {
        return false
    }
}


function mudarEtapa(){

    const etapas = [etapa1, etapa2, etapa3, etapa4];
    const bolinhas = [vEtapa1, vEtapa2, vEtapa3, vEtapa4]

    // Oculta todas as etapas menos a etapa atual
    etapas.forEach((el, i) => {
        el.classList.toggle("cadastroInvisivel", i !== etapaAtual);
    });

    // Atualiza as bolinhas de progresso
    bolinhas.forEach((el, i) => {
        el.classList.toggle("etapaAtual", i === etapaAtual);
    });

    // Controle dos botões
    antBtn.classList.toggle("disabled", etapaAtual === 0);
    proxBtn.classList.toggle("d-none", etapaAtual === 3);
    fimBtn.classList.toggle("d-none", etapaAtual !== 3);
    
}

proxBtn.addEventListener("click", () => { 
    if(checarCamposVazios()){return}
    Array.from(inputsEtapas[etapaAtual]).forEach(input => {
                                            input.classList.remove('is-invalid');
                                        });

    etapaAtual++;
    mudarEtapa();
})

antBtn.addEventListener("click", () => {
    etapaAtual = etapaAtual - 1;
    mudarEtapa();
})