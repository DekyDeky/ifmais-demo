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
                        <a class='btn btn-info text-light px-4 disabled' href='#'><i class='bi bi-search'></i> Ver mais</a>
                    </div>
                </div>
            </div>
        ";
    }

?>