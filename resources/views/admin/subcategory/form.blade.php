<div class="row mb-1">
	<div class="form-group col-md-6">
        {!! Form::label('category_id','Category Name :',['class' => 'form-label']) !!}
        {!! Form::select('category_id', $category, null, ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('roll_number')
            {{ $message }}
            @enderror
        </span>
    </div>  
    <div class="form-group col-md-6">
        {!! Form::label('sub_category_name','Sub Category Name :',['class' => 'form-label']) !!}
        {!! Form::text('sub_category_name', null, ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('roll_number')
            {{ $message }}
            @enderror
        </span>
    </div>
</div>
<div class="row mb-1">
    <div class="col-sm-6">
		<label class="form-label">Image</label><span class="required text-danger">*</span><small style="color: red;">(635*403 pixels)</small>
		{!! Form::file('image',['class' => 'form-control'.$errors->first('image', ' error')]) !!}
		@if ($errors->has('image'))
				<span class="text-danger">{{ $errors->first('image') }}</span>
		@endif
		@if (isset($sub_category) && !is_null($service->image))
			<img src="{{ asset('uploads/subcategory/'.$service->image) }}" style="width: 150px;" class="mt-1">
		@endif
	</div>
</div>
<div class="row mb-1">
    <div class="col-sm-6">
        <label class="form-label">Status</label>
        <div class="form-check form-check-success form-switch">
            {{-- <input  name="status" class="form-check-input" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" > --}}
            {!! Form::checkbox('status',1,flush(),['class' =>'form-check-input','data-off-color' => 'danger','data-on-color' => 'success','data-off-text' => 'Inactive','data-toggle' => 'toggle']) !!}
        </div>
    </div>  
</div>
<div class="row mt-1">
    <div class="col-12">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <a href="{{ route('sub-category.index') }}" class="btn 	btn-outline-secondary">Cancel</a>
    </div>
</div>

