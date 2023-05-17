@extends($adminTheme)

@section("title")
Contact US 
@endsection

@section("style")
  <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/plugins/forms/form-validation.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/assets/css/style.css') }}">
@endsection   

@section("wrapper")
  <section class="app-user-list">
        <!-- list and filter start -->
        <div class="card">
            <div class="card-body border-bottom">
                <div class="row" style="margin-bottom: -20px;">
                    <div class="col-md-10">
                      <h4 class="card-title">Contact US</h4>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="contact-us-list-table table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th width="30%">Name</th>
                            <th width="35%">Email</th>
                            <th width="35%">Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
            </div>
        </div>
        <!-- list and filter end -->
    </section>
@endsection
@section("script")
<script>
  $(document).ready(function(){
    $(function () {
      // Users List datatable
      var table = $('.contact-us-list-table').DataTable({
        ajax: "{{ route('contactus.index') }}",
        columns: [
          // columns according to JSON
          {data:'DT_RowIndex', name: 'DT_RowIndex'},
          {data:'name', name: 'name'},
          {data:'email', name: 'email'},
          {data:'number', name: 'number'},
          {data:'action', name: 'action'},
        ],
        
        pageLength : 50,
        lengthMenu : [ 10, 50, 100, 200, 300, 400, 500],
        dom:
          '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
          '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
          '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
          '>t' +
          '<"d-flex justify-content-between mx-2 row mb-1"' +
          '<"col-sm-12 col-md-6"i>' +
          '<"col-sm-12 col-md-6"p>' +
          '>',
        language: {
          sLengthMenu: 'Show _MENU_',
          search: 'Search',
          searchPlaceholder: 'Search..'
        },
        // Buttons with Dropdown
        buttons: [
          {
            extend: 'collection',
            className: 'btn btn-outline-secondary dropdown-toggle me-2',
            text: feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
            buttons: [
              {
                extend: 'print',
                text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                className: 'dropdown-item',
              },
              {
                extend: 'csv',
                text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                className: 'dropdown-item',
              },
              {
                extend: 'excel',
                text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                className: 'dropdown-item',
              },
              {
                extend: 'pdf',
                text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                className: 'dropdown-item',
              },
              {
                extend: 'copy',
                text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                className: 'dropdown-item',
              }
            ],
            init: function (api, node, config) {
              $(node).removeClass('btn-secondary');
              $(node).parent().removeClass('btn-group');
              setTimeout(function () {
                $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
              }, 50);
            }
          }
        ],
        language: {
          paginate: {
            // remove previous & next text from pagination
            previous: '&nbsp;',
            next: '&nbsp;'
          }
        },
        "fnDrawCallback": function() {
            $('[data-bs-toggle="tooltip"]').tooltip({
                "html": true,
            });
        }
      });
    });
    $.fn.dataTable.ext.errMode = 'throw';
  });
</script>
@endsection 