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


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>

@yield('custom_js')
@stack('scripts')