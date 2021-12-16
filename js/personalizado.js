document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        plugins: ['interaction', 'dayGrid', 'list', 'timegrid'],
        header:
        {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listYear'
        },
        selectable: true,
        eventLimit: true,
<<<<<<< HEAD
        events: 'backend/listar_eventos.php',

=======

        events: './backend/listar_eventos.php',
>>>>>>> 36fd29b403d3d6ff8decc3d1140d9c2182d0c74e
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        },

        select: function (info) {
            $('#cadastrar #start').val(info.start.toLocaleString());
            $('#cadastrar #end').val(info.end.toLocaleString());
            $('#cadastrar').modal('show');
        },

        eventClick: function (info) {
            info.jsEvent.preventDefault();
            $("#apagar_evento").attr("href", "./backend/deletar_evento.php?id=" + info.event.id);
            $('#visualizar #id').text(info.event.id);
            $('#visualizar #id').val(info.event.id);
            $('#visualizar #title').text(info.event.title);
            $('#visualizar #title').val(info.event.title);
            $('#visualizar #start').text(info.event.start.toLocaleString());
            $('#visualizar #start').val(info.event.start.toLocaleString());
            $('#visualizar #end').text(info.event.end.toLocaleString());
            $('#visualizar #end').val(info.event.end.toLocaleString());
            $('#visualizar #color').val(info.event.backgroundColor);
            $('#visualizar').modal('show');
        },
    });
    calendar.render();
});

<<<<<<< HEAD
=======
/* Mascara - valores de data/hora */
function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;

    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
    } else {
        event.returnValue = false;
    }
}

>>>>>>> 36fd29b403d3d6ff8decc3d1140d9c2182d0c74e
$(document).ready(function () {
    $("#addevent").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "./backend/criar_evento.php",
            data: new FormData(this),
            contentType: false,
            processData: false,

            success: function (retorna) {
                if (retorna['sit']) {
                    location.reload();
                } else {
                    $("#msg-add").html(retorna['msg']);
                }
            }
        })
    });

    $('.btn-canc-vis').on("click", function () {
        $('.visevent').slideToggle();
        $('.formedit').slideToggle();
    })

    $('.btn-canc-edit').on("click", function () {
        $('.formedit').slideToggle();
        $('.visevent').slideToggle();
    })

    $("#editevent").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "./backend/editar_evento.php",
            data: new FormData(this),
            contentType: false,
            processData: false,

            success: function (retorna) {
                if (retorna['sit']) {
                    location.reload();
                } else {
                    $("#msg-edit").html(retorna['msg']);
                }
            }
        })
    });
<<<<<<< HEAD

    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    $(".alert").fadeTo(3000, 500).slideUp(500, function(){
=======
    $(".alert").fadeTo(3000, 500).slideUp(500, function () {
>>>>>>> 36fd29b403d3d6ff8decc3d1140d9c2182d0c74e
        $(".alert").alert('close');
    });
});