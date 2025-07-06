<?php

    include 'config/database.php';

    $idUsuarioAtual = $_SESSION['idUsuario'];

    $avisoEspSelect = "SELECT * FROM aviso WHERE criadorAviso = $idUsuarioAtual";

    $todosAvisosEsp = mysqli_query($conn, $avisoEspSelect);

    if(mysqli_num_rows($todosAvisosEsp) > 0){
        while ($avisoEsp = mysqli_fetch_array($todosAvisosEsp)){

            $listTituloAviso = htmlspecialchars($avisoEsp['tituloAviso']);
            $listTextoAviso = htmlspecialchars($avisoEsp['descricaoAviso']);

            echo "
            <div class='geren-aviso'>
                <div class='geren-aviso-info'>
                    <h4>{$listTituloAviso}</h4>
                    <pre>{$listTextoAviso}</pre>
                    <p><strong>Validade:</strong>{$avisoEsp['validadeAviso']}</p>
                </div>
                <div class='geren-aviso-btn'>
                    <a href='#' class='btn btn-info abrir-modal-edicao' id='botaoEditarAviso' 
                    onclick='fecharTodosModais()'
                    data-id='{$avisoEsp['idAviso']}'
                    data-titulo='{$listTituloAviso}'
                    data-texto='{$listTextoAviso}'
                    data-validade='{$avisoEsp['validadeAviso']}'
                    data-bs-target='#modalEditarAviso'>
                        <i class='bi bi-pencil-fill'></i> Editar
                    </a>
                    <form method='POST' action='app/models/avisos/deletarAviso.php'>
                        <input type='hidden' name='idAviso' value='{$avisoEsp['idAviso']}'>
                        <button type='submit' class='btn btn-danger'><i class='bi bi-trash-fill'></i> Apagar</button>
                    </form>
                </div>
            </div>
            ";
        }
    } else {
        echo "
            <div class='geren-aviso'>
                <h3 class='text-center'> Você não criou nenhum aviso! </h3>
            </div>
        ";
    }

    

?>