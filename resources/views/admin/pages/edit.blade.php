@extends($adminTheme)

@section('title')
	{{ $page->title }}
@endsection

@section('style')
<style>
    .area-bg-color{
        background-color: #F2F2F2;
    }
    .area-bg-color{
        background-color: #F2F2F2;
    }
    .Editor-editor{
        border: 1px solid #e2e2e2 !important;
    }
    .note-dropdown-menu{
        border:1px solid red;
        background-color:#fff;
    }
    .note-editable{
        min-height:300px !important;
    }
</style>
@endsection

@section('wrapper')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="col-md-10">
                        <h4 class="card-title">{{ $page->title }}</h4>
                    </div>
                </div>

                <div class="card-body">
                    @if (count($errors) > 0)
			                <div class="row">
			                    <div class="col-md-12">
			                        <div class="alert alert-danger alert-dismissible">
			                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                            <h4><i class="icon fa fa-ban"></i> Error!</h4>
			                            @foreach($errors->all() as $error)
			                            {{ $error }} <br>
			                            @endforeach      
			                        </div>
			                    </div>
			                </div>
		                @endif
		                {!! Form::model($page, ['method' => 'PUT','route' => ["pages.update", $page],'files'=>true]) !!} 
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="form-label">Title:</label>
										{!! Form::text('title', $page->title, array('placeholder' => 'Enter Title','class' => 'form-control')) !!}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-12">
									<div class="form-group">
										<label class="form-label">English Content:</label>
							            {!! Form::textarea('content',$page->content,array('class' => 'form-control description')) !!}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-12">
									<div class="form-group">
										<label class="form-label">Spanish Content:</label>
							            {!! Form::textarea('sp_content',$page->sp_content,array('class' => 'form-control description')) !!}
									</div>
								</div>
							</div>
							<hr>
							<div class="row mt-1">
							    <div class="col-md-12 text-center">
							        <button type="submit" class="btn btn-primary">Submit</button>
							    </div>
							</div>
		                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')


<script type="text/javascript">
    $(document).ready(function() {
      $('.description').summernote({
        height: 250,
      });
    });
</script> 
@endsection