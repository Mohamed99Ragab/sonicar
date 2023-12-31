<!DOCTYPE html>
<html>

@include('dashboard.layouts.head')

<body>
<!-- <div class="pre-loader">
    <div class="pre-loader-box">
        <div class="loader-logo">
            <img src="vendors/images/deskapp-logo.svg" alt="" />
        </div>
        <div class="loader-progress" id="progress_div">
            <div class="bar" id="bar1"></div>
        </div>
        <div class="percent" id="percent1">0%</div>
        <div class="loading-text">Loading...</div>
    </div>
</div> -->

@include('dashboard.layouts.header')

@include('dashboard.layouts.right-sidebar')

@include('dashboard.layouts.left-sidebar')



<div class="mobile-menu-overlay"></div>

@yield('content')
@include('sweetalert::alert',['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])



@include('dashboard.layouts.footer')




@include('dashboard.layouts.scripts')



</body>
</html>
