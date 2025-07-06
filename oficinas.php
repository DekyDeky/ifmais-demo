<?php include "app/views/general/libs.php";?>
    <title>Home - IFMais</title>
    <link rel="stylesheet" href="css/oficinas.css">
    </head>
    <body>

    <?php
    
        session_start();

        if(!isset($_SESSION['idUsuario'])){
            header("Location: index.php")/
            exit;
        }

    ?>

        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light headerSideNav">
                    <img src="assets/logo.svg" alt="logo IFMais" width="150px" height="150px" class="logo_ifMais">
                    <img src="<?= $_SESSION['fotoUsuario'] ?>" alt="" class="icon_usuario">
                    <h1 class="nome_usuario"><?= $_SESSION['nomePessoa'] ?></h1>
                </div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="home.php"> <i class="bi bi-house-door-fill"></i> Página Inicial</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 disabled" href="#!"><i class="bi bi-person-fill"></i> Meu Perfil</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="oficinas.php"><i class="bi bi-gear-fill"></i> Gerenciar Oficinas</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 disabled" href="#!"><i class="bi bi-building-fill-gear"></i> Gerenciar Tarefas</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 disabled" href="#!"><i class="bi bi-calendar-week-fill"></i> Calendário do Projeto</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 text-danger" href="app/models/sairUser.php"><i class="bi bi-box-arrow-left"></i> Sair</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle"><i class="bi bi-list"></i></button>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid conteudo-main">
                    <div class="row">
                        <section class="col">
                            <h2 class="text-center">Minhas Oficinas</h2>
                            <div class="oficinas-usuario">

                                <div class="fundo-grid oficina d-flex align-items-center justify-content-between p-3 rounded-4">
                                    <img src="assets/excel.png" alt="" width="150px" height="150px" class="rounded-1">
                                    <div class="grid-textos oficina-textos flex-grow-1">
                                        <h3 class="oficina-titulo">Oficina: Excel Descomplicado</h3>
                                        <hr>
                                        <h4 class="mt-2">Sobre</h4>
                                        <p>Participe da nossa oficina "Excel Descomplicado" e aprenda, de forma prática e sem complicação, a usar o Excel como um verdadeiro profissional. Desenvolva habilidades essenciais para o dia a dia e otimize suas tarefas. Garanta já sua vaga e descomplique o Excel!</p>
                                        <p><strong>Professor(es):</strong> Henata Goiaba, Ricardo Hideki</p>
                                        <div class="d-flex justify-content-end gap-3">
                                            <button class="btn btn-success px-4 disabled"><i class="bi bi-person-lines-fill"></i> Lista de Presença</button>
                                            <button class="btn btn-warning px-4"><i class="bi bi-pencil-fill"></i> Editar</button>
                                            <button type='submit' class='btn btn-danger'><i class='bi bi-trash-fill'></i> Apagar</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <a class="oficina-add btn btn-success" href="criarOficina.php"><i class="bi bi-plus-lg"></i> Criar Oficina</a>

                        </section>
                        <section class="col">
                            <h2 class="text-center">Oficinas que Participo</h2>

                            <div class="oficinas-participar">

                                <div class="fundo-grid oficina d-flex align-items-center justify-content-between p-3 rounded-4">
                                    <img src="assets/excel.png" alt="" width="150px" height="150px" class="rounded-1">
                                    <div class="grid-textos oficina-textos flex-grow-1">
                                        <h3 class="oficina-titulo">Oficina: Excel Descomplicado</h3>
                                        <hr>
                                        <h4 class="mt-2">Sobre</h4>
                                        <p>Participe da nossa oficina "Excel Descomplicado" e aprenda, de forma prática e sem complicação, a usar o Excel como um verdadeiro profissional. Desenvolva habilidades essenciais para o dia a dia e otimize suas tarefas. Garanta já sua vaga e descomplique o Excel!</p>
                                        <p><strong>Professor(es):</strong> Henata Goiaba, Ricardo Hideki</p>
                                        <div class="d-flex justify-content-end gap-3">
                                                <a class="btn btn-info text-light px-4 disabled" href="#"><i class="bi bi-search"></i> Ver mais</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
</html>
