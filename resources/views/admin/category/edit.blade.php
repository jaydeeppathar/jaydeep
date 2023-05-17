@extends($adminTheme)

@section("title")
Edit Service Areas
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
                		<h4 class="card-title">Edit Service Areas</h4>
            		</div>
            		<div class="col-md-2" style="text-align: right;">
						<a href="{{ route('category.index') }}" class="btn btn-info head-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>                			
            		</div>
                </div>
                <div class="card-body">
                    {!! Form::model($category, ['method' => 'PUT','route' => ["category.update", $category],'files'=>true, 'class'=>'form']) !!} 

						@include('admin.category.form')

				   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!--end page wrapper -->
@endsection
@section("script")
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 250,
      });
    });
</script>	
@endsection
