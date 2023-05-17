@extends($adminTheme)

@section("title")
User Create
@endsection

@section("wrapper")
<!--start page wrapper -->
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-10">
                        <h4 class="card-title">User Create</h4>
                    </div>
                    <div class="col-md-2" style="text-align: right;">
                        <a href="{{ route('user.index') }}" class="btn btn-info head-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>                            
                    </div>
                </div>
                <div class="card-body">
                  {!! Form::open(array('route' => 'user.store','method'=>'POST','files'=>   'true','class'=>'form')) !!}

                        @include('admin.user.form')

                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!--end page wrapper -->
@endsection
@section("script")
    
@endsection
