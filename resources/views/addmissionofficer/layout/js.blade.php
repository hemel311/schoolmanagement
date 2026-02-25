<script src="{{asset('/assets/addmission')}}/plugins/common/common.min.js"></script>
<script src="{{asset('/assets/addmission')}}/js/custom.min.js"></script>
<script src="{{asset('/assets/addmission')}}/js/settings.js"></script>
<script src="{{asset('/assets/addmission')}}/js/gleek.js"></script>
<script src="{{asset('/assets/addmission')}}/js/styleSwitcher.js"></script>

<!-- Chartjs -->
<script src="{{asset('/assets/addmission')}}/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="{{asset('/assets/addmission')}}/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="{{asset('/assets/addmission')}}/plugins/d3v3/index.js"></script>
<script src="{{asset('/assets/addmission')}}/plugins/topojson/topojson.min.js"></script>
<script src="{{asset('/assets/addmission')}}plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="{{asset('/assets/addmission')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('/assets/addmission')}}/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="{{asset('/assets/addmission')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('/assets/addmission')}}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="{{asset('/assets/addmission')}}/plugins/chartist/js/chartist.min.js"></script>
<script src="{{asset('/assets/addmission')}}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



<script src="{{asset('/assets/addmission')}}/js/dashboard/dashboard-1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
    const notyf = new Notyf({
        duration: 3000,
        position: { x: 'right', y: 'top' }
    });

    @if (session('success'))
    notyf.success("{{ session('success') }}");
    @endif

    @if (session('error'))
    notyf.error("{{ session('error') }}");
    @endif
</script>