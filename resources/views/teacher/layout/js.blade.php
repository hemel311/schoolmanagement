<script src="{{asset('assets/teacher')}}/plugins/common/common.min.js"></script>
<script src="{{asset('assets/teacher')}}/js/custom.min.js"></script>
<script src="{{asset('assets/teacher')}}/js/settings.js"></script>
<script src="{{asset('assets/teacher')}}/js/gleek.js"></script>
<script src="{{asset('assets/teacher')}}/js/styleSwitcher.js"></script>

<!-- Chartjs -->
<script src="{{asset('assets/teacher')}}/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="{{asset('assets/teacher')}}/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="{{asset('assets/teacher')}}/plugins/d3v3/index.js"></script>
<script src="{{asset('assets/teacher')}}/plugins/topojson/topojson.min.js"></script>
<script src="{{asset('assets/teacher')}}/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="{{asset('assets/teacher')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('assets/teacher')}}/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="{{asset('assets/teacher')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('assets/teacher')}}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="{{asset('assets/teacher')}}/plugins/chartist/js/chartist.min.js"></script>
<script src="{{asset('assets/teacher')}}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



<script src="{{asset('assets/teacher')}}/js/dashboard/dashboard-1.js"></script>

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