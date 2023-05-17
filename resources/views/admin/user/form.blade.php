<div class="row mb-1">
	<div class="col-sm-6">
		<label class="form-label">User Name</label><span class="required text-danger">*</span>
		{!! Form::text('name', null, ['class' => 'form-control'.$errors->first('name', ' error'), 'placeholder' => 'Enter Name']) !!}
		@if ($errors->has('name'))
				<span class="text-danger">{{ $errors->first('name') }}</span>
		@endif
	</div>
	<div class="col-sm-6">
		<label class="form-label">Email</label><span class="required text-danger">*</span>
		{!! Form::text('email', null, ['class' => 'form-control'.$errors->first('email', ' error'), 'placeholder' => 'Enter email']) !!}
		@if ($errors->has('email'))
				<span class="text-danger">{{ $errors->first('email') }}</span>
		@endif
	</div>
</div>
<div class="row mb-1">
	<div class="col-sm-6">
		<label class="form-label">Password</label><span class="required text-danger">*</span>
		{!! Form::text('password', '', ['class' => 'form-control'.$errors->first('password', ' error'), 'placeholder' => 'Enter Password']) !!}
		@if ($errors->has('password'))
				<span class="text-danger">{{ $errors->first('password') }}</span>
		@endif
	</div>
	<div class="col-sm-6">
		<label class="form-label">Confirm Password</label><span class="text-danger">*</span>
		{!! Form::text('confirm_password', null, ['class' => 'form-control'.$errors->first('confirm_password', ' error'), 'placeholder' => 'Enter Confirm Password']) !!}
		@if ($errors->has('confirm_password'))
				<span class="text-danger">{{ $errors->first('confirm_password') }}</span>
		@endif
	</div>
</div>
	<div class="col-md-6 mb-1">
		<div class="form-group">
            <label>Type<span class="text-danger">*</span></label>
            {!! Form::select('type', [''=>'Select Type','0'=>'User','1'=>'Admin'], null, array('class' => 'form-control')) !!}
		</div>
	</div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
