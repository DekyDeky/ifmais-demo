<?php include "app/views/general/libs.php";?>
    <title>Home - IFMais</title>
    <link rel="stylesheet" href="css/oficinas.css">
    </head>
    <body>

    <?php
    
        session_start();

        if(!isset($_SESSION['idUsuario'])){
            header("Location: index.php");
            exit;
        }

        $nomeUsuarioAtual = $_SESSION['nomePessoa'];
        $cpfUsuarioAtual = $_SESSION['cpfPessoa'];

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
                    <h2 class="text-center mt-4">Criar Oficina</h2>
                    <form method="POST" action="app/controllers/criarOficina.php" class="form-oficina">
                        <div class="mb-3">
                            <label for="tituloOficina" class="form-label">Título da Oficina</label>
                            <input type="text" name="tituloOficina" id="tituloOficina" placeholder="Oficina: Excel Descomplicado" class="form-control" value="<?= htmlspecialchars($_SESSION['dadosOficina']['tituloOficina'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="sobreOficina" class="form-label">Sobre a Oficina</label>
                            <textarea type="text" name="sobreOficina" id="sobreOficina" placeholder="Participe da nossa oficina 'Excel Descomplicado'..." class="form-control" style="height: 100px;"><?= htmlspecialchars($_SESSION['dadosOficina']['sobreOficina'] ?? '') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dataOficina" class="form-label">Selecione a Data </label>
                            <input type="date" name="dataOficina" id="dataOficina" class="form-control" value="<?= htmlspecialchars($_SESSION['dadosOficina']['dataOficina'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="horaOficina" class="form-label">Selecione a Hora </label>
                            <input type="time" name="horaOficina" id="horaOficina" class="form-control" value="<?= htmlspecialchars($_SESSION['dadosOficina']['horaOficina'] ?? '') ?>">
                        </div>
                        <div class="mb-3 add-professores">
                            <div class="mb-3">
                                <label for="professoresOficina" class="form-label">Selecione os professores</label>
                                <select class="form-select" aria-label="Default select example" name="professoresOficina" id="professoresOficina">
                                    <?php include 'app/models/oficinas/listarProfessores.php' ?>  
                                </select>
                                <div class="invalid-feedback">
                                    Não é possível adicionar professores que já estão na lista.
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-success add-professores-btn" id="addProf"><i class="bi bi-plus-lg"></i> Adicionar Professor</button>
                            </div>
                            <ul class="add-professores-adicionados" id="listaProfs">
                                <li class="add-professores-view">
                                    <input type="hidden" name="cpfProfs[]" value="<?= $cpfUsuarioAtual ?>" class="cpfProfs">

                                    <h4>
                                        <?php echo "$nomeUsuarioAtual"; ?>
                                    </h4>

                                    <button class="btn btn-outline-danger disabled"><i class="bi bi-trash-fill"></i></button>
                                </li>
                            </ul>
                        </div>
                        <button type="submit" class="btn btn-success btn-criarOficina"><i class="bi bi-patch-check-fill"></i> Criar Oficina</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script src="js/adicionarProfessor.js"></script>

        <script>

            <?php
                if (!empty($_SESSION['errosOficina'])) {
                    foreach ($_SESSION['errosOficina'] as $campo => $problema) {

                        echo 'console.log("' . addslashes($campo) . ' => ' . addslashes($problema) . '");';

                        echo 'document.getElementById("' . addslashes($campo) . '").classList.add("is-invalid");';
                             

                    }

                    unset($_SESSION['errosOficina']);
                }   

                unset($_SESSION['dadosOficina'])
            
            ?>

        </script>

    </body>
</html>
