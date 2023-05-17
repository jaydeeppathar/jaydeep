@extends($adminTheme)

@section("title")
Contact US Show
@endsection

@section("style")
@endsection

@section("wrapper")
<!--start page wrapper -->
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
            		<div class="col-md-10">
                		<h4 class="card-title">Contact US Show</h4>
            		</div>
            		<div class="col-md-2" style="text-align: right;">
						<a href="{{ route('contact-us.index') }}" class="btn btn-info head-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>                			
            		</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Name:</strong> {{ $contactUs->name }}
                        </div>
                        <div class="col-md-12">
                            <strong>Email:</strong> {{ $contactUs->email }}
                        </div>
                        @if(!empty($contactUs->subject))
                            <div class="col-md-12">
                                <strong>Subject:</strong> {{ $contactUs->subject }}
                            </div>
                        @endif
                        @if(!empty($contactUs->message))
                            <div class="col-md-12">
                                <strong>Message:</strong> {{ $contactUs->message }}
                            </div>
                        @endif
                    </div>
                    <div class="row mt-1">
                        <div class="col-12">
                            <a href="{{ route('contact-us.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end page wrapper -->
@endsection
@section("script")

@endsection
