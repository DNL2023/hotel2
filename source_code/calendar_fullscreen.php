<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='fullcalendar/dist/index.global.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.0.2/index.global.min.js" integrity="sha256-pp6WZj4ir6am4lRlG+1USgwGiXVAFSFmiKgRJegDHFM=" crossorigin="anonymous"></script>
    <script>

document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
            locale: 'en',
            timeZone: 'UTC',
            initialView: 'dayGridWeek',
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
              },
            editable: true,
            resourceAreaHeaderContent: 'Rooms',
            resources: 'rest_api.php?path=events',
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