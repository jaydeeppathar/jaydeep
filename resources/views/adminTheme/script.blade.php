<!-- BEGIN: Vendor JS-->
<script src="{{ asset('adminTheme/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('adminTheme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
<!-- END: Page Vendor JS-->
<script src="{{ asset('adminTheme/app-assets/js/scripts/extensions/ext-component-toastr.js') }}"></script>
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('adminTheme/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('adminTheme/app-assets/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('adminTheme/app-assets/js/core/app.min.js') }}"></script>
<script src="{{ asset('adminTheme/app-assets/js/scripts/customizer.min.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('adminTheme/app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('adminTheme/app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('adminTheme/app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('adminTheme/app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
<script src="{{ asset('adminTheme/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('adminTheme/app-assets/vendors/js/file-uploaders/dropzone.min.js') }}"></script>
<!-- END: Page JS-->

<script>
  $(window).on('load',  function(){
    if (feather) {
      feather.replace({ width: 14, height: 14 });
    }
  })
</script>

<script src="{{ asset('adminTheme/assets/js/sweetalert2.js') }}"></script>
<script src="{{ asset('adminTheme/assets/js/delete.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>