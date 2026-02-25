<script src="{{asset('assets/accountant')}}/plugins/common/common.min.js"></script>
<script src="{{asset('assets/accountant')}}/js/custom.min.js"></script>
<script src="{{asset('assets/accountant')}}/js/settings.js"></script>
<script src="{{asset('assets/accountant')}}/js/gleek.js"></script>
<script src="{{asset('assets/accountant')}}/js/styleSwitcher.js"></script>

<!-- Chartjs -->
<script src="{{asset('assets/accountant')}}/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="{{asset('assets/accountant')}}/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="{{asset('assets/accountant')}}/plugins/d3v3/index.js"></script>
<script src="{{asset('assets/accountant')}}/plugins/topojson/topojson.min.js"></script>
<script src="{{asset('assets/accountant')}}/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="{{asset('assets/accountant')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('assets/accountant')}}/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="{{asset('assets/accountant')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('assets/accountant')}}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="{{asset('assets/accountant')}}/plugins/chartist/js/chartist.min.js"></script>
<script src="{{asset('assets/accountant')}}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



<script src="{{asset('assets/accountant')}}/js/dashboard/dashboard-1.js"></script>
<script src="{{asset('assets/accountant')}}/js/dashboard/dashboard-1.js"></script>
{{--notyfjs--}}
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