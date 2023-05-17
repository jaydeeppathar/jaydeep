<div class="row mb-1">
    <div class="form-group col-md-6">
        {!! Form::label('category_id','Category Name :',['class' => 'form-label']) !!}
        {!! Form::select('category_id', $category, null, ['class' => 'form-control','id'=>'category']) !!}
       {{--   <select  id="category" name="category_id" class="form-control">
            <option value="">-- Select Category --</option>
            @foreach ($category as $data)
                <option value="{{$data->id}}">
                    {{$data->name}}
                </option>
            @endforeach
        </select> --}}
        <span class="text-danger">
            @error('roll_number')
            {{ $message }}
            @enderror
        </span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('sub_category_id','Sub Category Name :',['class' => 'form-label']) !!}
         <select id="subcategory" name="sub_category_id" class="form-control"></select>
        {{-- {!! Form::select('sub_category_id',$data, null, ['class' => 'form-control']) !!} --}}
        {{-- <select id="subcategory" class="form-control" name="subcategory_id" required>
            @foreach ($subcategory as $subcategory)
                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
            @endforeach
        </select> --}}
        <span class="text-danger">
            @error('roll_number')
            {{ $message }}
            @enderror
        </span>
    </div>
 </div>
<div class="row mb-1">
    <div class="col-sm-6">
        <label class="form-label">Product Name :</label><span class="required text-danger">*</span>
        {!! Form::text('product_name', null, ['class' => 'form-control'.$errors->first('name', ' error'), 'placeholder' => 'Enter Name']) !!}
        @if ($errors->has('product_name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>    
    <div class="col-sm-6">
        <label class="form-label">Price :</label><span class="required text-danger">*</span>
        {!! Form::text('price', null, ['class' => 'form-control'.$errors->first('name', ' error'), 'placeholder' => 'Enter Name']) !!}
        @if ($errors->has('price'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>  
<div class="row mb-1">
    <div class="col-sm-6">
        <label class="form-label">Discount :</label><span class="required text-danger">*</span>
        {!! Form::text('discount', null, ['class' => 'form-control'.$errors->first('name', ' error'), 'placeholder' => 'Enter Name']) !!}
        @if ($errors->has('discount'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="col-sm-6">
        <label class="form-label">Image</label><span class="required text-danger">*</span><small style="color: red;">(635*403 pixels)</small>
        {!! Form::file('image',['class' => 'form-control'.$errors->first('image', ' error')]) !!}
        @if ($errors->has('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
        @endif
    </div>
</div>
<div class="row mb-1">
   <div class="col-sm-6">
        <label class="form-label">Description :</label><span class="required text-danger">*</span>
        {!! Form::textarea('description', null, ['class' => 'form-control'.$errors->first('name', ' error'), 'placeholder' => 'Enter Name','rows'=>"3"]) !!}
        @if ($errors->has('description'))
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        /*------------------------------------------
        --------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#category').on('change', function () {

            var idCategory = this.value;

            $("#subcategory").html('');

            $.ajax({
                url: "{{url('/fetch-subcategory')}}",
                type: "POST",
                data: {
                    category_id: idCategory,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    $.each(result, function (key, value) {
                        console.log(value.sub_category_name);
                        $("#subcategory").append('<option value="' + value.id + '">' + value.sub_category_name + '</option>');
                    });
                }
            });
        });
    });
</script>