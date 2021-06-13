
<!-- Footer -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                Developed By FYP - Group #4
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<!-- jQuery  -->
<script src="admin/assets/js/jquery.min.js"></script>
<script src="admin/assets/js/popper.min.js"></script>
<script src="admin/assets/js/bootstrap.min.js"></script>
<script src="admin/assets/js/modernizr.min.js"></script>
<script src="admin/assets/js/waves.js"></script>
<script src="admin/assets/js/jquery.slimscroll.js"></script>
<script src="admin/assets/js/jquery.nicescroll.js"></script>
<script src="admin/assets/js/jquery.scrollTo.min.js"></script>

<!-- Required datatable js -->
<script src="admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="admin/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="admin/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="admin/assets/plugins/datatables/jszip.min.js"></script>
<script src="admin/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="admin/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="admin/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="admin/assets/plugins/datatables/buttons.print.min.js"></script>
<script src="admin/assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="admin/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="admin/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="admin/assets/pages/datatables.init.js"></script>

<!-- App js -->
<script src="admin/assets/js/app.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable2').DataTable();
    } );
</script>
<script>
    /* BEGIN SVG WEATHER ICON */
    if (typeof Skycons !== 'undefined'){
        var icons = new Skycons(
            {"color": "#fff"},
            {"resizeClear": true}
            ),
            list  = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for(i = list.length; i--; )
            icons.set(list[i], list[i]);
        icons.play();
    };

    // scroll

    $(document).ready(function() {

        $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true});
        $("#boxscroll2").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true});

    });
</script>



</body>
</html>