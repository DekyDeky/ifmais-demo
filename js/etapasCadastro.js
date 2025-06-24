const vEtapa1 = document.getElementById("vEtapa1")
const vEtapa2 = document.getElementById("vEtapa2")
const vEtapa3 = document.getElementById("vEtapa3")
const vEtapa4 = document.getElementById("vEtapa4")

const etapa1 = document.getElementById("rEtapa1");
const etapa2 = document.getElementById("rEtapa2");
const etapa3 = document.getElementById("rEtapa3");

const inputsE1 = etapa1.querySelectorAll('input');
const inputsE2 = etapa2.querySelectorAll('input');

const proxBtn = document.getElementById('proxBtn');
const antBtn = document.getElementById('antBtn');

const etapas = [etapa1, etapa2];
const inputsEtapas = [inputsE1, inputsE2];

let etapaAtual = 0

function mudarEtapa(){

    console.log("clicando")

    switch (etapaAtual){
        case 0:
            etapa1.classList.remove("cadastroInvisivel");
            etapa2.classList.add("cadastroInvisivel");
            antBtn.classList.add("disabled");
            vEtapa1.classList.add("etapaAtual");
            vEtapa2.classList.remove("etapaAtual");
            break;
        case 1:
            etapa1.classList.add("cadastroInvisivel");
            etapa2.classList.remove("cadastroInvisivel");
            antBtn.classList.remove("disabled");
            vEtapa1.classList.remove("etapaAtual");
            vEtapa2.classList.add("etapaAtual");
            vEtapa3.classList.remove("etapaAtual");
            break;
        case 2:
            etapa2.classList.add("cadastroInvisivel");
            etapa3.classList.remove("cadastroInvisivel");
            vEtapa2.classList.remove("etapaAtual");
            vEtapa3.classList.add("etapaAtual");
            vEtapa4.classList.remove("etapaAtual");
            break;
    }
}

proxBtn.addEventListener("click", () => {
    etapaAtual++;
    mudarEtapa();
})

antBtn.addEventListener("click", () => {
    etapaAtual = etapaAtual - 1;
    mudarEtapa();
})