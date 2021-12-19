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

        events: './backend/listar_eventos.php',

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
            url: "./backend/aceitar_evento.php",
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

    $(".alert").fadeTo(3000, 500).slideUp(500, function () {
        $(".alert").alert('close');
    });

    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
});