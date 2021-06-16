<script src="{{ asset('admins/cuba/assets/js/editor/ckeditor/ckeditor.js') }}"></script>

<script>
    $(document).ready(function () {

        $('.show_confirm').on('click',function(e) {
            if(!confirm('Are you sure you want to delete this?')) {
                e.preventDefault();
            } else {
                this.closest('form').submit();
            }
        });

        CKEDITOR.config.language = "{{ app() -> getLocale() }}" // end ck editor

        // image preview
        $(".image").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        }); // end of image preview

        // Floor plan preview
        $(".floor_plan").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.floor_plan_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        }); // end of image preview

    }); // end of ready
</script>

{{-- start cuba scripts --}}

<script src="{{asset('admins/cuba/assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('admins/cuba/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('admins/cuba/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('admins/cuba/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('admins/cuba/assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('admins/cuba/assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('admins/cuba/assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script id="menu" src="{{asset('admins/cuba/assets/js/sidebar-menu.js')}}"></script>
@yield('script')

@if(Route::current()->getName() != 'popover')
    <script src="{{asset('admins/cuba/assets/js/tooltip-init.js')}}"></script>
@endif

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('admins/cuba/assets/js/script.js')}}"></script>
<script src="{{asset('admins/cuba/assets/js/theme-customizer/customizer.js')}}"></script>


{{-- @if(Route::current()->getName() == 'index')
	<script src="{{asset('admins/cuba/assets/js/layout-change.js')}}"></script>
@endif --}}
