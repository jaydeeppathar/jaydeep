@extends($adminTheme)

@section("title")
Show Contact Office
@endsection

@section("style")
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <style type="text/css">
      .note-editor.note-frame{
        margin: 0px !important;
      }
  </style>
@endsection

@section("wrapper")
<!--start page wrapper -->
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
            		<div class="col-md-10">
                		<h4 class="card-title">Show Contact Office</h4>
            		</div>
            		<div class="col-md-2" style="text-align: right;">
						<a href="{{ route('offices.index') }}" class="btn btn-info head-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Back"><i class="fa fa-arrow-left" aria-hidden="true"> Back</i></a>                			
            		</div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width:100px;">Name</th>
                            <td>{{ $office->name }}</td>
                        </tr>
                        <tr>
                            <th style="width:100px;">Contact</th>
                            <td>{{ $office->contact }}</td>
                        </tr>
                        <tr>
                            <th style="width:100px;">Email</th>
                            <td>{{ $office->email }}</td>
                        </tr>
                        <tr>
                            <th style="width:100px;">Fax No.</th>
                            <td>{{ $office->fax }}</td>
                        </tr>
                        <tr>
                            <th style="width:100px;">Location</th>
                            <td>{{ $office->location }}</td>
                        </tr>
                        <tr>
                            <th style="width:100px;">Map Link</th>
                            <td style="word-break: break-all;">{{ $office->map_link }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end page wrapper -->
@endsection
@section("script")
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
@endsection
