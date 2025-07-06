<?php

    $oficinaProfsArr = [];

    $idOficinaAtual = $oficinasUser['idOficina'];

    $oficinasProfesoresSQL = "SELECT nomePessoa FROM pessoa, professores_oficina WHERE idOficina = $idOficinaAtual AND cpfProfessor = pessoa.cpfPessoa";
    $checarOficinasProfs = mysqli_query($conn,$oficinasProfesoresSQL);

    while($OficinaProf = mysqli_fetch_assoc($checarOficinasProfs)){
        array_push($oficinaProfsArr, $OficinaProf['nomePessoa']);
    }

    $oficinaProfsStr = implode(', ', $oficinaProfsArr);

?>