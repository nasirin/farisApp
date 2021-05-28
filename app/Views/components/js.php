<!--Basic Scripts-->
<script src="/template/assets/js/jquery.min.js"></script>
<script src="/template/assets/js/bootstrap.min.js"></script>
<script src="/template/assets/js/slimscroll/jquery.slimscroll.min.js"></script>

<!--Beyond Scripts-->
<script src="/template/assets/js/beyond.js"></script>


<!--Page Related Scripts-->
<!--Sparkline Charts Needed Scripts-->
<script src="/template/assets/js/charts/sparkline/jquery.sparkline.js"></script>
<script src="/template/assets/js/charts/sparkline/sparkline-init.js"></script>

<!--Easy Pie Charts Needed Scripts-->
<script src="/template/assets/js/charts/easypiechart/jquery.easypiechart.js"></script>
<script src="/template/assets/js/charts/easypiechart/easypiechart-init.js"></script>

<!--Flot Charts Needed Scripts-->
<script src="/template/assets/js/charts/flot/jquery.flot.js"></script>
<script src="/template/assets/js/charts/flot/jquery.flot.resize.js"></script>
<script src="/template/assets/js/charts/flot/jquery.flot.pie.js"></script>
<script src="/template/assets/js/charts/flot/jquery.flot.tooltip.js"></script>
<script src="/template/assets/js/charts/flot/jquery.flot.orderbars.js"></script>

<!-- date picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js"></script>

<!-- data table -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<!-- vmap -->
<script type="text/javascript" src="/vmap/dist/jquery.vmap.js"></script>
<script type="text/javascript" src="/vmap/dist/maps/jquery.vmap.indonesia.js" charset="utf-8"></script>
<script type="text/javascript" src="/vmap/js/jquery.vmap.electioncolors.js"></script>

<script>
    $('.date-own').datepicker({
        minViewMode: 2,
        format: 'yyyy'
    });
    $('.month-own').datepicker({
        language: 'id',
        startView: "months",
        minViewMode: "months",
        format: 'MM'
    });
    $('#table').DataTable();
    $('#vmap').vectorMap({
        map: 'indonesia_id',
        enableZoom: false,
        showTooltip: true,
        selectedColor: null,
        color: '#FFCE55',
        backgroundColor: '#eee',
        borderColor: '#fff',
        borderWidth: 2,
        hoverColor: '#fff',
        onRegionClick: function(event, code, region) {
            event.preventDefault();
        }
    });
</script>