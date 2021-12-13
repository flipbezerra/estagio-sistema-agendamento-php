<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <html>

        <head>
            <title>Sistema de Agendamentos - UFAC</title>
            <!-- Required meta tags -->
            <meta charset='utf-8' />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
            <!-- FullCalendar CSS -->
            <link href='css/core.css' rel='stylesheet' />
            <link href='css/daygrid.css' rel='stylesheet' />
            <link href='css/daygrid.css' rel='stylesheet' />
            <link href='css/list.css' rel='stylesheet' />
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <!-- Ícone UFAC -->
            <link rel="shortcut icon" type="image/x-icon" href="https://sistemas.ufac.br/home/wp-content/themes/sistemas/staticIndex/imagens/logo_ufac.gif">
            <link href='css/personalizado.css' rel='stylesheet'>
        </head>

        <body>
            <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
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
                            <a href="index.php"><i class="fa fa-home"></i> Página Inicial</a>
                        </li>
                        <li>
                            <a href="login.php"><i class="fa fa-user"></i> Login</a>
                        </li>
                        <li class="active">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-map"></i> Espaços</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href="#"><span class="dot" style="background-color:#FFD700"></span> Auditório </a>
                                </li>
                                <li>
                                    <a href="#"><span class="dot" style="background-color:#0000FF"></span> Piscina </a>
                                </li>
                                <li>
                                    <a href="#"><span class="dot" style="background-color:#FFA500"></span> Quadra de Areia </a>
                                </li>
                                <li>
                                    <a href="#"><span class="dot" style="background-color:#228B22"></span> Laboratório Charles Babbage </a>
                                </li>
                            </ul>
                        </li>
                        <!--<li>
                        <a href="#">Contato</a>
                    </li>
                        <li id="logout">
                            <a href="backend/logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                        </li>-->
                    </ul>
                </nav>
                <div id="content">
                    <div id='calendar'></div>
                </div>
            </div>
            <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="visevent">
                                <dl class="row">
                                    <dt class="col-sm-3">ID do evento</dt>
                                    <dd class="col-sm-9" id="id"></dd>

                                    <dt class="col-sm-3">Título do evento</dt>
                                    <dd class="col-sm-9" id="title"></dd>

                                    <dt class="col-sm-3">Início do evento</dt>
                                    <dd class="col-sm-9" id="start"></dd>

                                    <dt class="col-sm-3">Fim do evento</dt>
                                    <dd class="col-sm-9" id="end"></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Evento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <span id="msg-add"></span>
                            <form id="addevent" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Título</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Espaço</label>
                                    <div class="col-sm-10">
                                        <!--<select name="color" class="form-control" id="color">
                                        <option value="">Selecione</option>
                                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                        <option style="color:#0000FF;" value="#0000FF">Azul</option>
                                        <option style="color:#808080;" value="#808080">Cinza</option>
                                        <option style="color:#FFA500;" value="#FFA500">Laranja</option>
                                        <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                        <option style="color:#993399;" value="#993399">Roxo</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                        <option style="color:#228B22;" value="#228B22">Verde</option>
                                        <option style="color:#FF0000;" value="#FF0000">Vermelho</option>
                                    </select>-->
                                        <select name="color" class="form-control" id="color">
                                            <option value="">Selecione o espaço...</option>
                                            <option style="color:#FFD700;" value="#FFD700">Auditório</option>
                                            <option style="color:#0000FF;" value="#0000FF">Piscina</option>
                                            <option style="color:#FFA500;" value="#FFA500">Quadra</option>
                                            <option style="color:#228B22;" value="#228B22">Laboratório</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Início do evento</label>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" name="start" class="form-control" id="start">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Final do evento</label>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" name="end" class="form-control" id="end">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="AddEvent" id="AddEvent" value="AddEvent" class="btn btn-success">Cadastrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FullCalendar Scripts -->
            <script src='js/core.js'></script>
            <script src='js/interaction.js'></script>
            <script src='js/daygrid.js'></script>
            <script src='js/timegrid.js'></script>
            <script src='js/list.js'></script>
            <script src='js/locales-all.js'></script>
            <!-- JQuery Script -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <!-- Popper Script -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <!-- Bootstrap Script -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <!-- FontAwesome Scripts -->
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
            <script src="js/personalizado.js"></script>
        </body>

    </html>