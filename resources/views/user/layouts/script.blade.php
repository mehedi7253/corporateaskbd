<!-- Jquery Core Js -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('template/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('template/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('template/plugins/node-waves/waves.js') }}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('template/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>


<!-- Custom Js -->
<script src="{{ asset('template/js/admin.js') }}"></script>
<script src="{{ asset('template/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('template/js/pages/forms/editors.js') }}"></script>

<!-- Demo Js -->
<script src="{{ asset('template/js/demo.js') }}"></script>

<!-- Ckeditor -->
<script src="{{ asset('template/plugins/ckeditor/ckeditor.js') }}"></script>

<!-- TinyMCE -->
<script src="{{ asset('template/plugins/tinymce/tinymce.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

            @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

            @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

            @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
<script type="application/javascript">
    $(document).ready(function () {
        $('#prntPSS').click(function() {
            var printContents = $('#mainFrame').html();
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });
    });
</script>