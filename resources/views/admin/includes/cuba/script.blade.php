<script src="{{asset('admins/assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('admins/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('admins/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('admins/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('admins/assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('admins/assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('admins/assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script id="menu" src="{{asset('admins/assets/js/sidebar-menu.js')}}"></script>
@yield('script')

@if(Route::current()->getName() != 'popover')
    <script src="{{asset('admins/assets/js/tooltip-init.js')}}"></script>
@endif

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('admins/assets/js/script.js')}}"></script>
<script src="{{asset('admins/assets/js/theme-customizer/customizer.js')}}"></script>


{{-- @if(Route::current()->getName() == 'index')
	<script src="{{asset('admins/assets/js/layout-change.js')}}"></script>
@endif --}}
