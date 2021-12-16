<?php
require_once './backend/conexao.php';
//iniciando sessão se existir
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
                <li>
                    <a href="login.php"><i class="fa fa-user"></i> Login</a>
                </li>
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
                <!-- Título do modal  -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalhes da solicitação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Visualização dos detalhes do evento -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Solicitar uso de espaço</h5>
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
                                    <option value="">Selecione o espaço...</option>
                                    <optgroup label="Áreas para eventos/conferências"></optgroup>
                                    <option value="Anfiteatro">Anfiteatro</option>
                                    <option value="Sala de Conferências">Sala de Conferências</option>
                                    <optgroup label="Áreas para esportes"></optgroup>
                                    <option value="Piscina">Piscina</option>
                                    <option value="Quadra de areia">Quadra de areia</option>
                                    <option value="Quadra coberta">Quadra coberta</option>
                                    <optgroup label="Laboratórios"></optgroup>
                                    <option value="Laboratório de Informática">Laboratório de Informática</option>
                                    <option value="Laboratório de Agronomia">Laboratório de Agronomia</option>
                                </select>
                            </div>
                        </div>
                        <!--<div class="form-group row">
                            <label class="col-sm-2 col-form-label">Cor</label>
                            <div class="col-sm-10">
                                <select name="color" class="form-control" id="color">
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
                                </select>
                            </div>
                        </div>-->
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
                                <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Identificação (matrícula), atividade a ser realizada...">
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