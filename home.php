<?php include "app/views/general/libs.php";?>
    <title>Home - IFMais</title>
    <link rel="stylesheet" href="css/home.css">
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"> <i class="bi bi-house-door-fill"></i> Página Inicial</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="bi bi-person-fill"></i> Meu Perfil</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="bi bi-megaphone-fill"></i> Gerenciar Avisos</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 disabled" href="#!"><i class="bi bi-gear-fill"></i> Gerenciar Oficinas</a>
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
                <div class="container-fluid">
                    <section class="row">

                        <div class="col-8 secao-general">
                            <h2 class="text-center">Pedidos de Auxílio</h2>
                            <!-- Pedido Place Holder -->
                            <div class="pedidos">

                                <div class="pedido d-flex align-items-center justify-content-between p-3 rounded-4">
                                    <img src="assets/ph_empresa.png" alt="" width="150px" height="150px" class="rounded-1">
                                    <div class="pedido-textos flex-grow-1">
                                        <h3 class="pedido-titulo">WebComp Ltda.</h3>
                                        <hr>
                                        <h4 class="mt-2">Sobre</h4>
                                        <p>A WebComp Ltda., empresa especializada em soluções digitais e desenvolvimento de sistemas web, está em busca de um(a) desenvolvedor(a) front-end freelancer para atuar em um projeto pontual e estratégico.</p>
                                        <ul class="pedido-tags list-unstyled d-flex justify-content-left gap-3 flex-wrap">
                                            <li class="tag">Front-End</li>
                                            <li class="tag">IHC</li>
                                            <li class="tag">Comunicação</li>
                                            <li class="tag">Lógica de Programação</li>
                                        </ul>
                                        <div class="d-flex justify-content-center gap-3">
                                            <button class="btn btn-success px-4"><i class="bi bi-check-circle"></i> Aceitar</button>
                                            <button class="btn btn-danger px-4"><i class="bi bi-x-circle"></i> Recusar</button>
                                            <button class="btn btn-info text-light px-4"><i class="bi bi-search"></i> Ver mais</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col section-general">
                            <h2 class="text-center">Avisos</h2>
                            <div class="avisos">
                                <div class="aviso p-3 rounded-4">
                                    <h4 class="text-center text-danger">MANUTENÇÃO NO SISTEMA</h4>
                                    <pre style="white-space:pre-wrap;">Informamos que o sistema da WebComp Ltda. passará por uma manutenção programada no dia <strong>06/07/2025</strong>, das <strong>22h às 02h</strong>. Durante esse período, os serviços poderão ficar temporariamente indisponíveis.
Agradecemos pela compreensão e estamos trabalhando para melhorar continuamente nossa plataforma.</pre>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
