<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <title>Sobre - Sistema de Agendamentos - UFAC</title>
        <!-- Required meta tags -->
        <meta charset='utf-8' />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <!-- FullCalendar CSS -->
        <link href='./css/core.css' rel='stylesheet' />
        <link href='./css/daygrid.css' rel='stylesheet' />
        <link href='./css/daygrid.css' rel='stylesheet' />
        <link href='./css/list.css' rel='stylesheet' />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <!-- Ícone UFAC -->
        <link rel="shortcut icon" type="image/x-icon" href="https://sistemas.ufac.br/home/wp-content/themes/sistemas/staticIndex/imagens/logo_ufac.gif">
        <!-- Formatação personalizada usando CSS -->
        <link href='./css/personalizado.css' rel='stylesheet'>
    </head>

    <body class="d-flex flex-column">
        <div class="wrapper">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <img id="logo" src="resources/ufac.png" alt="logo">
                    <br>
                    <h3>Agendamento de espaços</h3>
                </div>
                <ul class="list-unstyled components">
                    <p>Universidade Federal do Acre</p>
                    <li>
                        <a href="index_aut.php"><i class="fa fa-home"></i> Página Inicial</a>
                    </li>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-map"></i> Espaços</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="index.php?cod=1"> Áreas para eventos/conferências</a>
                            </li>
                            <li>
                                <a href="index.php?cod=2"> Áreas para esportes</a>
                            </li>
                            <li>
                                <a href="index.php?cod=3"> Laboratórios</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="sobre.php"><i class="fas fa-info-circle"></i> Sobre</a>
                    </li>
                </ul>
            </nav>
            <div id="content">
                <!-- Chama os alertas de alterações no banco de dados -->
                <?php
                    if (isset($_SESSION['msg'])) 
                    {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
                <!--Barra contendo o botão que expande/retrai o menu sidebar--> 
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fas fa-bars"></i> Menu</button>
                    </div>
                </nav>
                <!-- About section one-->
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-left">
                        <div class="col-lg-10">
                            <h2 class="fw-bolder">Sistema de agendamento de espaços da Universidade Federal do Acre</h2>
                            <p class="lead fw-normal text-muted mb-0">Para solicitar o uso de um espaço, clique em qualquer dia no calendário, preencha o formulário e aguarde a aprovação do administrador.</p>
                            <p class="lead fw-normal text-muted mb-0">Solicitações com aprovação pendente estão no calendário em cor <span style="color: #FFD700">amarela</span> e as aprovadas estão em <span style="color: #00D100">verde</span>.</p>
                            <p class="lead fw-normal text-muted mb-0">Elaborado pelos alunos do curso de Sistemas de Informação, Felipe Bezerra Lima e Victor Alexandre Lima Ribeiro, e supervisionado pelo professor Frederico Tavares.</p>
                            <h4 class="fw-bolder">Contato:</h4>
                            <p class="lead fw-normal text-muted mb-0"><a href="https://github.com/Bezerha">github.com/Bezerha</a></p>
                            <p class="lead fw-normal text-muted mb-0"><a href="https://github.com/vyctor922">github.com/vyctor922</a></p>
                            <p class="lead fw-normal text-muted mb-0"><a href="https://github.com/fredtavares2018">github.com/fredtavares2018</a></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JQuery Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Popper Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <!-- Bootstrap Script -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- JQuerry Scroller Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- FontAwesome Scripts -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <!-- Scripts personalizados -->
        <script src="js/personalizado.js"></script>
    </body>

</html>
