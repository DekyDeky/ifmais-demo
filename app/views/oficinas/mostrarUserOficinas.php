<?php

while($oficinasUser = mysqli_fetch_assoc($checarUserOficinas)){

        include 'app/models/oficinas/TratarUserOficinas.php';

        echo "
            <div class='fundo-grid oficina d-flex align-items-center justify-content-between p-3 rounded-4 my-4'>
                <img src='$fotoUserOficina' alt='' width='150px' height='150px' class='rounded-1'>
                <div class='grid-textos oficina-textos flex-grow-1'>
                    <h3 class='oficina-titulo'>$tituloUserOficina</h3>
                    <hr>
                    <h4 class='mt-2'>Sobre</h4>
                    <p>$sobreUserOficina</p>
                    <p><strong>Professor(es): </strong>$oficinaProfsStr</p>
                    <p><strong>Data: </strong>$dataUserOficina</p>
                    <p><strong>Horário: </strong>$horarioUserOficina</p> 
                    <div class='d-flex justify-content-end gap-3'>
                        <button class='btn btn-success px-4 disabled'><i class='bi bi-person-lines-fill'></i> Lista de Presença</button>
                        <a class='btn btn-warning px-4' href='editarOficina.php?idOficina=$idOficinaAtual'><i class='bi bi-pencil-fill'></i> Editar</a>
                        <form method='POST' action='app/models/oficinas/apagarOficina.php'>
                            <input type='hidden' name='idOficina' value='$idOficinaAtual'>
                            <button type='submit' class='btn btn-danger'><i class='bi bi-trash-fill'></i> Apagar</button>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }

?>