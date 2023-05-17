<div class="row mb-1">
	<div class="col-sm-6">
		<label class="form-label">Title</label><span class="required">*</span>
		{!! Form::text('title', null, ['class' => 'form-control'.$errors->first('title', ' error'), 'placeholder' => 'Enter Title']) !!}
		@if ($errors->has('title'))
				<span class="text-danger">{{ $errors->first('title') }}</span>
		@endif
	</div>
	<div class="col-sm-6">
		<label class="form-label">Image</label><span class="required">*</span><small style="color: red;">(388*388 pixels)</small>
		{!! Form::file('image',['class' => 'form-control'.$errors->first('image', ' error')]) !!}
		@if ($errors->has('image'))
				<span class="text-danger">{{ $errors->first('image') }}</span>
		@endif
		@if (isset($whatWeDo) && !is_null($whatWeDo->image))
			<img src="{{ asset('uploads/whatWeDo/'.$whatWeDo->image) }}" style="width: 150px;" class="mt-1">
		@endif

	</div>
</div>
<div class="row mb-1">
	<div class="col-sm-12">
		<label class="form-label">Description</label><span class="required">*</span>
		{!! Form::textarea('description', null, ['class' => 'form-control'.$errors->first('description', ' error'), 'placeholder' => 'Enter description', 'rows' => '6']) !!}
		@if ($errors->has('description'))
				<span class="text-danger">{{ $errors->first('description') }}</span>
		@endif
	</div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <a href="{{ route('whatwedo.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</div>