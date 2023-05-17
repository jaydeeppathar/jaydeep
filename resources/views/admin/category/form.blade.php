<div class="row mb-1">
    <div class="col-sm-6">
        <label class="form-label">Name :</label><span class="required text-danger">*</span>
        {!! Form::text('name', null, ['class' => 'form-control'.$errors->first('name', ' error'), 'placeholder' => 'Enter Name']) !!}
        @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="col-sm-6">
        <label class="form-label">Status</label>
        <div class="form-check form-check-success form-switch">
            {{-- <input  name="status" class="form-check-input" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" > --}}
            {!! Form::checkbox('status',1,flush(),['class' =>'form-check-input','data-off-color' => 'danger','data-on-color' => 'success','data-off-text' => 'Inactive','data-toggle' => 'toggle']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</div>