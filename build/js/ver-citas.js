document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        customButtons: {    
            botonListarDia: {
              text: 'Listar',
              click: function() {
                calendar.changeView('listYear');
              }
            }
          },
        headerToolbar: {
            start: 'prev,next today',
            center: 'title',
            end: 'dayGridMonth,timeGridWeek,timeGridDay botonListarDia'
        },
        validRange: function(nowDate) {
            let endDate = new Date(nowDate);
            endDate.setMonth(nowDate.getMonth() + 2);
            return {
              start: nowDate,
              end: endDate
            };
          },
        events: {
            url: 'obtener_eventos.php', // URL para obtener los eventos del PHP
            method: 'GET',
            failure: function(e) {
                console.log(e);
                console.error('Error al cargar los eventos');
            }
        }

    });
    calendar.render();
  });