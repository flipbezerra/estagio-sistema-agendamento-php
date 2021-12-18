<?php
    require_once './backend/conexao.php';
    //iniciando sessão se existir
    session_start();
    //verificar autenticação, se não houver, voltar para login
    if(!isset($_SESSION['usuario'])):
        header('Location: login.php');
    endif;
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <html>

        <head>
            <title>Sistema de Agendamentos - Administração - UFAC</title>
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
            <!-- Scrollbar Custom CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
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
                        <!--<li>
                            <a href="login.php"><i class="fa fa-user"></i> Login</a>
                        </li>-->
                        <li class="active">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-map"></i> Espaços</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href="#"> Áreas para eventos/conferências</a>
                                </li>
                                <li>
                                    <a href="#"> Áreas para esportes</a>
                                </li>
                                <li>
                                    <a href="#"> Laboratórios</a>
                                </li>
                            </ul>
                        <li id="logout">
                            <a href="backend/logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                        </li>
                    </ul>
                </nav>
                <div id="content">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </nav>
                    <div id='calendar'></div>
                </div>
            </div>
            <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <?php
                            include 'backend/conexao.php';
                            $query_listar = "SELECT * FROM events";
                            $buscar_events = mysqli_query($conn, $query_listar);
                            while ($retorno_events = mysqli_fetch_array($buscar_events)) {
                        ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detalhes da solicitação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="visevent">
                                <dl class="row">
                                    <dt class="col-sm-3">Espaço solicitado</dt>
                                    <dd class="col-sm-9" id="title"></dd>

                                    <dt class="col-sm-3">Início da ocupação</dt>
                                    <dd class="col-sm-9" id="start"></dd>

                                    <dt class="col-sm-3">Fim da ocupação</dt>
                                    <dd class="col-sm-9" id="end"></dd>
                                </dl>
                                <button class="btn btn-warning btn-canc-vis">Ver solicitação</button>
                                <a href="" id="apagar_evento" class="btn btn-danger">Apagar</a>
                            </div>
                            <div class="formedit">
                                <span id="msg-edit"></span>
                                <form id="editevent" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Espaço: </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" id="title" value="<?php echo $retorno_events['title']; ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Início da ocupação: </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="start" class="form-control" id="start" value="<?php echo $retorno_events['start']; ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Fim da ocupação: </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="end" class="form-control" id="end" value="<?php echo $retorno_events['end']; ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Detalhes: </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="descricao" class="form-control" id="descricao" value="<?php echo $retorno_events['descricao']; ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Solicitação aprovada: </label>
                                        <div class="col-sm-10">
                                            <br>
                                            <input type="checkbox" name="status" id="status" value="<?php echo $retorno_events['status']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-danger btn-canc-edit">Cancelar</button>
                                            <button type="submit" name="AddEvent" id="AddEvent" value="AddEvent" class="btn btn-warning">Confirmar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                            } 
                        ?>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Solicitar espaço</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <span id="msg-add"></span>
                            <form id="addevent" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Espaço: </label>
                                    <div class="col-sm-10">
                                        <select name="title" class="form-control" id="title">
                                            <option value="" disabled selected hidden>Selecione um espaço...</option>
                                            <optgroup label="Áreas para eventos/conferências">
                                                <option value="Anfiteatro">Anfiteatro</option>
                                                <option value="Sala de Conferências">Sala de Conferências</option>
                                            </optgroup>
                                            <optgroup label="Áreas para esportes">
                                                <option value="Piscina">Piscina</option>
                                                <option value="Quadra de areia">Quadra de areia</option>
                                                <option value="Quadra coberta">Quadra coberta</option>
                                            </optgroup>
                                            <optgroup label="Laboratórios">
                                                <option value="Laboratório de Informática">Laboratório de Informática</option>
                                                <option value="Laboratório de Agronomia">Laboratório de Agronomia</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Início da ocupação: </label>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" name="start" class="form-control" id="start">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Fim da ocupação: </label>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" name="end" class="form-control" id="end">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Detalhes: </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Nº matrícula, atividade a ser realizada...">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="AddEvent" id="AddEvent" value="AddEvent" class="btn btn-success">Solicitar</button>
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
            <!-- JQuerry Scroller Script -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
            <!-- FontAwesome Scripts -->
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
            <script src="js/personalizado.js"></script>
        </body>

    </html>