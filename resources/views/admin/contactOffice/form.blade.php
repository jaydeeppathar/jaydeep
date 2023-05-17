<div class="row mb-1">
	<div class="col-sm-6">
		<label class="form-label">Name</label><span class="required text-danger">*</span>
		{!! Form::text('name', null, ['class' => 'form-control'.$errors->first('name', ' error'), 'placeholder' => 'Enter Name']) !!}
		@if ($errors->has('name'))
			<span class="text-danger">{{ $errors->first('name') }}</span>
		@endif
	</div>
	<div class="col-sm-6">
		<label class="form-label">Contact</label><span class="required text-danger">*</span>
		{!! Form::text('contact', null, ['class' => 'form-control'.$errors->first('contact', ' error'), 'placeholder' => 'Enter Contact']) !!}
		@if ($errors->has('contact'))
			<span class="text-danger">{{ $errors->first('contact') }}</span>
		@endif
	</div>
</div>
<div class="row mb-1">
    <div class="col-sm-6">
        <label class="form-label">Email</label><span class="required text-danger">*</span>
        {!! Form::text('email', null, ['class' => 'form-control'.$errors->first('email', ' error'), 'placeholder' => 'Enter email']) !!}
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="col-sm-6">
        <label class="form-label">Fax No.</label><span class="required text-danger">*</span>
        {!! Form::text('fax', null, ['class' => 'form-control'.$errors->first('fax', ' error'), 'placeholder' => 'Enter Fax No.']) !!}
        @if ($errors->has('fax'))
            <span class="text-danger">{{ $errors->first('fax') }}</span>
        @endif
    </div>
</div>
<div class="row mb-1">
    <div class="col-sm-12 mb-1">
        <label class="form-label">Location</label><span class="required text-danger">*</span>
        {!! Form::textarea('location', null, ['class' => 'form-control'.$errors->first('location', ' error'), 'placeholder' => 'Enter Location','rows'=>'3']) !!}
        @if ($errors->has('location'))
            <span class="text-danger">{{ $errors->first('location') }}</span>
        @endif
    </div>
    <div class="col-sm-12">
        <label class="form-label">Map Link</label><span class="required text-danger">*</span>
        {!! Form::textarea('map_link', null, ['class' => 'form-control'.$errors->first('map_link', ' error'), 'placeholder' => 'Enter Map Link','rows'=>'3']) !!}
        @if ($errors->has('map_link'))
            <span class="text-danger">{{ $errors->first('map_link') }}</span>
        @endif
    </div>
</div>
<div class="row mt-1">
    <div class="col-12">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <a href="{{ route('offices.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</div>