<!-- js -->
<script src="{{asset('dashboard/vendors/scripts/core.js')}}"></script>
<script src="{{asset('dashboard/vendors/scripts/script.min.js')}}"></script>
<script src="{{asset('dashboard/vendors/scripts/process.js')}}"></script>
<script src="{{asset('dashboard/vendors/scripts/layout-settings.js')}}"></script>
<script src="{{asset('dashboard/src/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('dashboard/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dashboard/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/vendors/scripts/dashboard3.js')}}"></script>
<!-- Google Tag Manager (noscript) -->
<noscript
><iframe
        src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
        height="0"
        width="0"
        style="display: none; visibility: hidden"
    ></iframe
    ></noscript>
@yield('js')
<!-- End Google Tag Manager (noscript) -->


<script>
    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif





</script>


