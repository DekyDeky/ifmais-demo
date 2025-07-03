// ========== Elementos do DOM ========== \\

//Bolinhas
const vEtapa1 = document.getElementById("vEtapa1")
const vEtapa2 = document.getElementById("vEtapa2")
const vEtapa3 = document.getElementById("vEtapa3")
const vEtapa4 = document.getElementById("vEtapa4")

//Páginas
const etapa1 = document.getElementById("rEtapa1");
const etapa2 = document.getElementById("rEtapa2");
const etapa3 = document.getElementById("rEtapa3");
const etapa4 = document.getElementById("rEtapa4");

//Todos os inputs de cada página
const inputsE1 = etapa1.querySelectorAll('input');
const inputsE2 = etapa2.querySelectorAll('input');
const inputsE3 = etapa3.querySelectorAll('input');
const inputsE4 = etapa4.querySelectorAll('input');

//Botões
const proxBtn = document.getElementById('proxBtn');
const antBtn = document.getElementById('antBtn');
const fimBtn = document.getElementById('fimBtn');

// ========== Array de Inputs (Usado para passar de etapa no eventListner) ========== \\
const inputsEtapas = [inputsE1, inputsE2, inputsE3, inputsE4];

// ========== Declaração de Etapas no ambiente Global ========== \\
let etapaAtual = 0

// ========== Função para checar se o input tem apenas letras ========== \\
function checarLetras(){

    const inputsCharsInvalidos = Array.from(inputsEtapas[etapaAtual]) //Pega todos os inputs que possuem a tag "data-apenas-letras"
                                      .filter( input => input.hasAttribute('data-apenas-letras') )
                                      .every( input => /^[a-zA-ZÀ-ÿ\s]+$/.test(input.value.trim()) || input.value.trim() === '');                                  

    if(inputsCharsInvalidos){
        return true
    }else {
        return false
    }

}

// ========== Função para checar se as senhas são iguais ========== \\
function senhaIgual(){
    const senha = document.getElementById('senhaUsuario').value;
    const confirmarSenha = document.getElementById('confirmarSenhaUsuario').value;

    if(senha == confirmarSenha){
        return true
    } else {
        return false
    }
}

// ========== Função para checar se há campos obrigatórios vazios ========== \\
function checarCamposVazios(){

    const temInputsVazios = Array.from(inputsEtapas[etapaAtual]).some( //Pega todos os inputs vazios com o atributo required
                                input => input.hasAttribute('required') && input.value.trim() === ''
                            );
    if(temInputsVazios){
        return true //Retorna true que há campos inválidos
    }else {
        return false
    }
}

// ========== Função para checar tamanho e tipo do arquivo ========== \\
function checarArquivo(){
    const arquivoInput = document.getElementById("fotoUsuario");
    const arquivo = arquivoInput.files[0]

    if(!arquivo){return false}
    
    if(arquivo.size > 5 * 1024 * 1024){
        invalidarCampos(input => input.id == 'fotoUsuario');
        arquivoInput.value = "";
        return true
    }

    if(!arquivo.type.match(/^image\/(jpeg|png)$/)) {
        invalidarCampos(input => input.id == 'fotoUsuario');
        arquivoInput.value = "";
        return true
    }

    return false
}

// ========== Função para aplicar a classe "is-invalid" para campos inválidos ========== \\
function invalidarCampos(filtro){
    Array.from(inputsEtapas[etapaAtual])
         .filter(filtro)
         .forEach(input => {
            input.classList.add('is-invalid')
         })
}

// ========== Função para mudar de etapa ========== \\
function mudarEtapa(){

    if(etapaAtual == 1){
        console.log(document.getElementById('dataNascUsuario').value)
    }

    // Declaração de etapas e bolinhas e títulos
    const etapas = [etapa1, etapa2, etapa3, etapa4];
    const bolinhas = [vEtapa1, vEtapa2, vEtapa3, vEtapa4];
    const titulos = ['Informações Pessoais', 'Informações do Usuário', 'Titulações', 'Endereço']

    // Altera a bolinha atual de acordo com a etapa
    document.getElementById('cadastro-status').innerHTML = [titulos[etapaAtual]]

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

// ========== Deteca se o botão de próximo foi apertado ========== \\
proxBtn.addEventListener("click", () => { 
    //if(checarProblemas()){return}

    problemaValidacao = false //Declara variavel sobre campos inválidos

    Array.from(inputsEtapas[etapaAtual]).forEach(input => { //Remove todos os avisos de campo inválido
        input.classList.remove('is-invalid');
    });

    if(checarCamposVazios()){ //Checa se há campos vazios
        invalidarCampos(input => input.hasAttribute('required') && input.value.trim() === '');
        problemaValidacao = true;
    }

    if(!checarLetras()){
        invalidarCampos(input => input.hasAttribute('data-apenas-letras') && !/^[a-zA-ZÀ-ÿ\s]+$/.test(input.value.trim()) && input.value.trim() != '')
        problemaValidacao = true;
    }

    if(etapaAtual == 1) { //Só checa se a página atual for a segunda
        if(!senhaIgual()){ //Checa se as senhas são iguais
            invalidarCampos(input => input.id === 'senhaUsuario' || input.id === 'confirmarSenhaUsuario');
            problemaValidacao = true
        } 

        if(checarArquivo()){ //Checa se o arquivo de foto é válido
            problemaValidacao = true;
        }
    }

    if(problemaValidacao == true){ //Se houve um problema, permanece na página
        return
    }

    etapaAtual++; //Caso tudo der certo, avança para a próxima etapa
    mudarEtapa();
})

// ========== Deteca se o botão "anterior" foi apertado ========== \\
antBtn.addEventListener("click", () => {
    etapaAtual = etapaAtual - 1; //Retorna uma página
    mudarEtapa();
})

fimBtn.addEventListener("click", (event) => {
    problemaValidacao = false;

    Array.from(inputsEtapas[etapaAtual]).forEach(input => { //Remove todos os avisos de campo inválido
        input.classList.remove('is-invalid');
    });

    if(checarCamposVazios()){ //Checa se há campos vazios
        invalidarCampos(input => input.hasAttribute('required') && input.value.trim() === '');
        problemaValidacao = true;
    }

    if(!checarLetras()){
        invalidarCampos(input => input.hasAttribute('data-apenas-letras') && !/^[a-zA-ZÀ-ÿ\s]+$/.test(input.value.trim()) && input.value.trim() != '')
        problemaValidacao = true;
    }

    if(problemaValidacao){
        event.preventDefault();
    }else {

        document.querySelectorAll('.cadastroEtapa').forEach(function(etapa) {
            etapa.classList.remove('cadastroInvisivel');
        });

        document.getElementById("formRegistro").submit()
    }
})