<?php
    require_once './backend/conexao.php';
    /* Iniciando sessão */
    session_start();
    /* Verificação de login | se existe redirecionar para index do admin */
    if (isset($_SESSION['usuario']))
    {
        header('Location: index_aut.php');
    }
    /* Fechando conexão */
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <title>Sistema de Agendamentos - UFAC</title>
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

    <body>
        <!-- Embrulha os objetos do website para que o menu sidebar e o conteúdo interajam corretamente-->
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
                        <a href="./"><i class="fa fa-home"></i> Página Inicial</a>
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
                        <a href="sobre.php">Sobre</a>
                    </li>
                    <li>
                        <a href="login.php"><i class="fa fa-user"></i> Login</a>
                    </li>
                    <!--
                    <li id="logout">
                        <a href="./backend/logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </li>
                    -->
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
                <div id='calendar'></div>
            </div>
        </div>
        <!-- Modal de visualização dos detalhes do evento -->
        <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Título do modal -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes do evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Visualização dos detalhes do evento -->
                    <div class="modal-body">
                        <div class="visevent">
                            <dl class="row">
                                <dt class="col-sm-3">Espaço solicitado:</dt>
                                <dd class="col-sm-9" id="title"></dd>

                                <dt class="col-sm-3">Início da reserva:</dt>
                                <dd class="col-sm-9" id="start"></dd>

                                <dt class="col-sm-3">Fim da reserva:</dt>
                                <dd class="col-sm-9" id="end"></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de criação do evento -->
        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Título do modal -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Solicitar espaço</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Formulário de criação do evento -->
                    <div class="modal-body">
                        <span id="msg-add"></span>
                        <form id="addevent" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Espaço: </label>
                                <div class="col-sm-10">
                                    <select name="title" class="form-control" id="title" required="required">
                                        <option value="" disabled selected hidden>Selecione um espaço...</option>
                                        <optgroup label="Áreas para eventos/conferências">
                                            <option value="Anfiteatro">Anfiteatro</option>
                                            <option value="Teatro">Teatro</option>
                                            <option value="Sala de Conferências">Sala de Convenções</option>
                                        </optgroup>
                                        <optgroup label="Áreas para esportes">
                                            <option value="Piscina">Piscina</option>
                                            <option value="Quadra de Areia">Quadra de Areia</option>
                                            <option value="Quadra Coberta">Quadra Coberta</option>
                                        </optgroup>
                                        <optgroup label="Laboratórios">
                                            <option value="Laboratório de Informática">Laboratório de Informática</option>
                                            <option value="Laboratório de Agronomia">Laboratório de Agronomia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Início da reserva: </label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="start" class="form-control" id="start" required="required">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fim da reserva: </label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="end" class="form-control" id="end" required="required">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Detalhes: </label>
                                <div class="col-sm-10">
                                    <textarea name="descricao" class="form-control" id="descricao" rows="3" placeholder="Nº matrícula, atividade a ser realizada..." required="required"></textarea>
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
        <script src='./js/core.js'></script>
        <script src='./js/interaction.js'></script>
        <script src='./js/daygrid.js'></script>
        <script src='./js/timegrid.js'></script>
        <script src='./js/list.js'></script>
        <script src='./js/locales-all.js'></script>
        <!-- JQuery Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Popper Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <!-- Bootstrap Script -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- FontAwesome Scripts -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <!-- Scripts personalizados -->      
        <script src="js/personalizado.js"></script>
    </body>

</html>