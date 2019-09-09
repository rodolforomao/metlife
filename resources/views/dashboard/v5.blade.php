@extends('layouts.master') 
@section('content')
    
    <link rel="stylesheet" href="/dist/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/dist/plugins/fullcalendar/fullcalendar.print.css" media="print">

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div> -->
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Agenda</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">

                           <div class="card">
                               <div class="card-header">
                                    <h4 class="card-title">Novos Eventos</h4>
                                </div>
                                <div class="card-body">
                                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                        <ul class="fc-color-picker" id="color-chooser">
                                            <li><a class="text-success" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-warning" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-info" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-danger" href="#"><i class="fa fa-square"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="input-group" style="width: 100%; margin-bottom: 10px;">
                                        <input id="new-event" type="text" class="form-control" placeholder="Escreva aqui...">

                                        <div class="input-group-append">
                                            <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Salvar</button>
                                        </div>
                                    </div>
                                    <div id="external-events">
                                        <div class="external-event bg-success">Ligação (Gabriel Omami)</div>
                                        <div class="external-event bg-warning">Ausente</div>     
                                        <div class="external-event bg-info">Reunião Externa</div>                                       
                                        <div class="external-event bg-danger">Reunião Rodolfo</div>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                              <div class="card-header">
                                    <h4 class="card-title">Ligações Pendentes</h4>
                                </div>
                                <div class="card-body">         
                                    <div id="external-events">
                                        <div class="external-event bg-secondary">João Sousa</div>
                                        <div class="external-event bg-secondary">Ana Maria</div>     
                                        <div class="external-event bg-secondary">José Carlos</div>                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-body p-0">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 

    <script src="/dist/plugins/jquery/jquery.min.js"></script>
    <script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="/dist/plugins/fullcalendar/moment.min.js"></script>
    <script src="/dist/plugins/fullcalendar/fullcalendar.min.js"></script>
    <!-- Page specific script -->
    <script>
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex        : 1070,
              revert        : true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            })

          })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()
        $('#calendar').fullCalendar({
            ignoreTimezone: false,
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],

            columnFormat: {
                month: 'ddd',
                week: 'ddd d',
                day: ''
            },
            axisFormat: 'H:mm',
            timeFormat: {
                '': 'H:mm',
                agenda: 'H:mm{ - H:mm}'
            },
          header    : {
            left  : 'prev,next today',
            center: 'title',
            right : 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: "Hoje",
            month: "Mês",
            week: "Semana",
            day: "Dia"
          },
          //Random default events
          events    : [
            {
              title          : 'Reunião Rodolfo',
              start          : new Date(y, m, 1),
              backgroundColor: '#f56954', //red
              borderColor    : '#f56954' //red
            },
            {
              title          : 'Ausente',
              start          : new Date(y, m, d - 5),
              end            : new Date(y, m, d - 2),
              backgroundColor: '#f39c12', //yellow
              borderColor    : '#f39c12' //yellow
            },
            {
              title          : 'Reunião Externa',
              start          : new Date(y, m, d, 12, 0),
              end            : new Date(y, m, d, 14, 0),
              allDay         : false,
              backgroundColor: '#00c0ef', //Info (aqua)
              borderColor    : '#00c0ef' //Info (aqua)
            },
            {
              title          : 'Ligação (Gabriel Omami)',
              start          : new Date(y, m, d + 1, 19, 0),
              end            : new Date(y, m, d + 1, 22, 30),
              allDay         : false,
              backgroundColor: '#00a65a', //Success (green)
              borderColor    : '#00a65a' //Success (green)
            }
          ],
          editable  : true,
          droppable : true, // this allows things to be dropped onto the calendar !!!
          drop      : function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject')

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject)

            // assign it the date that was reported
            copiedEventObject.start           = date
            copiedEventObject.allDay          = allDay
            copiedEventObject.backgroundColor = $(this).css('background-color')
            copiedEventObject.borderColor     = $(this).css('border-color')

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove()
            }

          }
        })

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function (e) {
          e.preventDefault()
          //Save color
          currColor = $(this).css('color')
          //Add color effect to button
          $('#add-new-event').css({
            'background-color': currColor,
            'border-color'    : currColor
          })
        })
        $('#add-new-event').click(function (e) {
          e.preventDefault()
          //Get value and make sure it is not null
          var val = $('#new-event').val()
          if (val.length == 0) {
            return
          }

          //Create events
          var event = $('<div />')
          event.css({
            'background-color': currColor,
            'border-color'    : currColor,
            'color'           : '#fff'
          }).addClass('external-event')
          event.html(val)
          $('#external-events').prepend(event)

          //Add draggable funtionality
          ini_events(event)

          //Remove event from text input
          $('#new-event').val('')
        })
      })
    </script>
@endsection