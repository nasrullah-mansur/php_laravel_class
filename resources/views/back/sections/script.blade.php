<!-- Jquery Core Js --> 
<script src="{{ asset('back/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{ asset('back/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js --> 

<script src="{{ asset('back/bundles/sparkline.bundle.js') }}"></script> <!-- Sparkline Plugin Js -->
<script src="{{ asset('back/bundles/c3.bundle.js') }}"></script>

<script src="{{ asset('back/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('back/plugins/dropify/js/dropify.min.js') }}"></script>

<script src="{{ asset('back/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->

<script src="{{ asset('back/plugins/summernote/dist/summernote.js') }}"></script>

<script src="{{ asset('back/plugins/select2/select2.min.js') }}"></script>

<script src="{{ asset('back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

{{-- <script src="//cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap.js"></script>
<script src="//cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.js"></script> --}}


@yield('custom_js')
@stack('scripts')