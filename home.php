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
                    <img src="assets/logo.svg" alt="logo IFMais" width="150px" class="logo_ifMais">
                    <img src="<?= $_SESSION['fotoUsuario'] ?>" width="125px" alt="" class="icon_usuario">
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
                    <h1 class="mt-4">Simple Sidebar</h1>
                    <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                    <p>
                        Make sure to keep all page content within the
                        <code>#page-content-wrapper</code>
                        . The top navbar is optional, and just for demonstration. Just create an element with the
                        <code>#sidebarToggle</code>
                        ID which will toggle the menu when clicked.
                    </p>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
