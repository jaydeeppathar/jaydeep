<div class="row mb-1">
	<div class="col-sm-6">
		<label class="form-label">Title</label><span class="required text-danger">*</span>
		{!! Form::text('title', null, ['class' => 'form-control'.$errors->first('title', ' error'), 'placeholder' => 'Enter Title']) !!}
		@if ($errors->has('title'))
				<span class="text-danger">{{ $errors->first('title') }}</span>
		@endif
	</div>
	<div class="col-sm-6">
		<label class="form-label">Sub Title</label><span class="required text-danger">*</span>
		{!! Form::text('sub_title', null, ['class' => 'form-control'.$errors->first('sub_title', ' error'), 'placeholder' => 'Enter Sub Title']) !!}
		@if ($errors->has('sub_title'))
				<span class="text-danger">{{ $errors->first('sub_title') }}</span>
		@endif
	</div>
</div>
<div class="row mb-1">
	<div class="col-sm-6">
		<label class="form-label">Link</label><span class="required text-danger">*</span>
		{!! Form::text('link', null, ['class' => 'form-control'.$errors->first('link', ' error'), 'placeholder' => 'Enter Link']) !!}
		@if ($errors->has('link'))
				<span class="text-danger">{{ $errors->first('link') }}</span>
		@endif
	</div>
	<div class="col-sm-6">
		<label class="form-label">Image</label><span class="required text-danger">*</span><small style="color: red;">(635*403 pixels)</small>
		{!! Form::file('image',['class' => 'form-control'.$errors->first('image', ' error')]) !!}
		@if ($errors->has('image'))
				<span class="text-danger">{{ $errors->first('image') }}</span>
		@endif
		@if (isset($service) && !is_null($service->image))
			<img src="{{ asset('uploads/service/'.$service->image) }}" style="width: 150px;" class="mt-1">
		@endif
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<label class="form-label">Description</label><span class="required text-danger">*</span>
		{!! Form::textarea('description', null, ['class' => 'form-control summernote'.$errors->first('description', ' error'), 'placeholder' => 'Enter description', 'raws' => '7', 'id' => 'editor']) !!}
		@if ($errors->has('description'))
				<span class="text-danger">{{ $errors->first('description') }}</span>
		@endif
	</div>
</div>
<div class="row mt-1">
    <div class="col-12">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</div>