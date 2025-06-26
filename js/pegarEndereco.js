document.getElementById("cepUsuario").addEventListener("blur", () => {
    const cep = document.getElementById("cepUsuario").value.replace(/\D/g, '');

    if (cep.length !== 8) return; // CEP deve ter 8 dígitos

    fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(data => {
            if (data.erro) {
                alert("CEP não encontrado.");
                return;
            }
            document.getElementById("ruaUsuario").value = data.logradouro;
            document.getElementById("bairroUsuario").value = data.bairro;
            document.getElementById("cidadeUsuario").value = data.localidade;
            document.getElementById("estadoUsuario").value = data.uf;
        });
});