<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='fullcalendar-scheduler/dist/index.global.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.0.3/index.global.js" integrity="sha256-3TxpEzyj+nZs6vOcfuVMs8QQmwISdXpO21SUymDFyDE=" crossorigin="anonymous"></script>
    <script>

document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
            locale: 'en',
            timeZone: 'UTC',
            events: [
            {
            start: '2023-01-01T08:00:00',
            end: '2023-01-01T12:00:00',
            display: 'background'
            }
            ],       
           // initialView: 'timelineWeek',
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
              },
            editable: false,
            resourceAreaHeaderContent: 'Rooms',
             resources: 'rest_api.php',
            events: 'rest_api.php?path=events' // <-- you forget this           
        });

        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>