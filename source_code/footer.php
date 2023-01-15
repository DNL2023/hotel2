   <!-- footer -->
   <footer class="footer"></footer>
   <!-- End footer -->
   </div>
   <!-- End Page wrapper  -->
   </div>
   <!-- End Wrapper -->
   <!-- All Jquery -->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
   <script src="js/lib/jquery/jquery.min.js"></script>
   <!-- Bootstrap tether Core JavaScript -->
   <script src="js/lib/bootstrap/js/popper.min.js"></script>
   <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
   <!-- slimscrollbar scrollbar JavaScript -->
   <script src="js/jquery.slimscroll.js"></script>
   <!--Menu sidebar -->
   <script src="js/sidebarmenu.js"></script>
   <!--stickey kit -->
   <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
   <!--Custom JavaScript -->
   <script src="js/lib/calendar-2/moment.latest.min.js"></script>
   <!-- scripit init-->
   <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
   <!-- scripit init-->
   <script src="js/lib/calendar-2/prism.min.js"></script>
   <!-- scripit init-->
   <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
   <!-- scripit init-->
   <script src="js/lib/calendar-2/pignose.init.js"></script>
   <script src="js/custom.min.js"></script>

   <script src="js/lib/datatables/datatables.min.js"></script>
   <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
   <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

   <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
   <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
   <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
   <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
   <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
   <script src="js/lib/datatables/datatables-init.js"></script>
   <script type="text/javascript">
       var selectCustomer = document.querySelector('#select_customer') // here you place the id="select_customer"

       selectCustomer.addEventListener('change', (e) => {
           console.log(e.target.value)
           // check if target value is adding_new_customer
           if (e.target.value === 'adding_new_customer') {
            //    alert('Yes the target is adding new customer')
            window.location.href = 'http://192.168.178.54:41062/www/app/add_customer.php'
           }
       })
   </script>
   <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.0.2/index.global.min.js" integrity="sha256-pp6WZj4ir6am4lRlG+1USgwGiXVAFSFmiKgRJegDHFM=" crossorigin="anonymous"></script>
   <script>
       document.addEventListener('DOMContentLoaded', function() {
           var calendarEl = document.getElementById('calendar');

           var calendar = new FullCalendar.Calendar(calendarEl, {
               schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
               timeZone: 'UTC',
               initialView: 'resourceTimeline',
               aspectRatio: 1.5,
               headerToolbar: {
                   left: 'prev,next',
                   center: 'title',
                   right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
               },
               editable: true,
               resourceAreaHeaderContent: 'Rooms',
               resources: 'rest_api.php?path=resources',
               events: 'rest_api.php?path=events' // <-- you forget this

           });

           calendar.render();
       });
   </script>


   </body>

   </html>