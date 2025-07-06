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

            if(isset($_GET['formAviso'])){
                $formAviso = $_GET['formAviso'];

                if($formAviso == 'concluido'){
                    echo "
                        <div class='alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 m-3' role='alert' id='alertaFlutuante'>
                            Cadastro realizado com sucesso!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";                
                }

                if($formAviso == 'deletado'){
                    echo "
                        <div class='alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 m-3' role='alert' id='alertaFlutuante'>
                            Aviso deletado com sucesso!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";        
                }

                if($formAviso == "editou"){
                    echo "
                        <div class='alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 m-3' role='alert' id='alertaFlutuante'>
                            Aviso editado com sucesso!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";
                }
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
                <div class="container-fluid conteudo-main d-flex">
                    <main class="main-contents">
                        <section class="row main-content">

                            <div class="col-8 secao-general">
                                <h2 class="text-center">Pedidos de Auxílio</h2>
                                <!-- Pedido Place Holder -->
                                <div class="pedidos">

                                    <div class="fundo-grid pedido d-flex align-items-center justify-content-between p-3 rounded-4">
                                        <img src="assets/ph_empresa.png" alt="" width="150px" height="150px" class="rounded-1">
                                        <div class="grid-textos pedido-textos flex-grow-1">
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
                                            <div class="d-flex justify-content-end gap-3">
                                                <button class="btn btn-success px-4"><i class="bi bi-check-circle"></i> Aceitar</button>
                                                <button class="btn btn-danger px-4"><i class="bi bi-x-circle"></i> Recusar</button>
                                                <button class="btn btn-info text-light px-4"><i class="bi bi-search"></i> Ver mais</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </section>

                        <section class="row main-content mt-4">
                            <div class="col-8 secao-general">
                                <h2 class="text-center">Oficinas</h2>

                                <div class="oficinas">

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
                            </div>
                        </section>
                    </main>
                    <aside class="avisos-aside">
                        <div class="section-general">
                            <div class="avisos-admin">
                                <button class="aviso-add btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#adicionarAviso"><i class="bi bi-plus-lg"></i></button>
                                <h2 class="text-center">Avisos</h2>
                                <button class="aviso-config btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalGerenciarAviso"><i class="bi bi-gear-fill"></i></button>
                            </div>
                            <div class="avisos">
                                <?php include ('app/models/avisos/listarAvisos.php'); ?>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>

        <!-- Modal para criar aviso -->
        <?php include 'app/views/homePage/modalAddAviso.php'; ?>

        <!-- Modal para gerenciar Aviso -->
        <?php include 'app/views/homePage/modalGerenAviso.php';?>

        <!-- Modal para editar um Aviso -->
        <?php include 'app/views/homePage/modalEditarAviso.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script>

            <?php
          
                if(isset($_SESSION['errosAviso'])){

                    if($_SESSION['errosAvisoTipo'] == 'addAviso'){

                        echo "
                            document.addEventListener('DOMContentLoaded', function() {
                            var meuModal = new bootstrap.Modal(document.getElementById('adicionarAviso'));
                            meuModal.show();
                            });
                        ";
                            
                        foreach($_SESSION['errosAviso'] as $campo){
                            echo 'document.getElementById("' . addslashes($campo) . '").classList.add("is-invalid");';
                        }
                    }

                    if($_SESSION['errosAvisoTipo'] == 'editAviso'){
                        echo "
                            document.addEventListener('DOMContentLoaded', function() {
                            var meuModal = new bootstrap.Modal(document.getElementById('modalEditarAviso'));
                            meuModal.show();
                            });
                        ";
                            
                        foreach($_SESSION['errosAviso'] as $campo){
                            echo 'document.getElementById("' . addslashes($campo) . '").classList.add("is-invalid");';
                        }
                    }

                    unset($_SESSION['errosAviso']);
                    unset($_SESSION['errosAvisoTipo']);
                    
                }

                if(isset($_GET['formAviso'])){
                    if($formAviso == 'deletado'){
                        echo "
                            document.addEventListener('DOMContentLoaded', function() {
                            var meuModal = new bootstrap.Modal(document.getElementById('gerenciarAviso'));
                            meuModal.show();
                            });
                        ";        
                    }
                }

                
                
            ?>

        </script>
    </body>
</html>
