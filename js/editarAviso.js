//Esse arquivo é uma enorme gambiarra
//Por algum motivo quando o usuário clica para abrir um modal ele acaba abrindo dois modais ao invés de um
//Só consegui contornar parte do problema com isso

document.addEventListener("DOMContentLoaded", function () {
    const botoesEditar = document.querySelectorAll(".abrir-modal-edicao");

    botoesEditar.forEach(botao => {
      botao.addEventListener("click", function (e) {
        e.preventDefault();

        const dados = this.dataset;
        const modalPai = bootstrap.Modal.getInstance(document.getElementById('gerenciarAviso'));

        // Espera o modal pai fechar antes de abrir o outro
        const modalEditar = new bootstrap.Modal(document.getElementById('modalEditarAviso'));

        const abrirModalEditar = () => {
          // Preencher os campos
          document.getElementById("editarTituloAviso").value = dados.titulo;
          document.getElementById("editarTextoAviso").value = dados.texto;
          document.getElementById("editarValidadeAviso").value = dados.validade;
          document.getElementById("editarIdAviso").value = dados.id;
          
          modalEditar.show();
        };

        // Se modal pai existe, espera ele fechar
        if (modalPai) {
          const modalElement = document.getElementById('gerenciarAviso');
          modalElement.addEventListener('hidden.bs.modal', function onClose() {
            abrirModalEditar();
            modalElement.removeEventListener('hidden.bs.modal', onClose); // limpa o listener
          });

          modalPai.hide();
        } else {
          // Se não tem modal pai, abre direto
          abrirModalEditar();
        }
      });
    });
  });

  function fecharTodosModais() {
  // Fecha qualquer modal aberto
    document.querySelectorAll('.modal.show').forEach(modal => {
      bootstrap.Modal.getInstance(modal)?.hide();
    });

    // Remove backdrops restantes
    document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
    document.body.classList.remove('modal-open');
}