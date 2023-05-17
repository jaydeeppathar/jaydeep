@extends($adminTheme)

@section("title")
About US Create
@endsection

@section("style")
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <style type="text/css">
    ul {
        list-style-type: none;
    }
    .ui-sortable-handle{
        cursor: move;
    }
  </style>
@endsection

@section("wrapper")
<!--start page wrapper -->
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
            		<div class="col-md-10">
                		<h4 class="card-title">About US</h4>
            		</div>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                {!! Form::open(array('route' => 'about-us.store','method'=>'POST','files'=>	'true','class'=>'form')) !!}
                                    <div>
                                        <h5>Clients List</h5>
                                    </div>
                                    <input type="hidden" name="type" value="1">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" id="name">
                                                <span class="text-danger error-text name_err"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary me-1 btn-client-list mr-0">Submit</button>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-12">
                                            @if(!empty($clientList))
                                                <ul class="client-list-append p-0" id="sortable">
                                                @foreach ($clientList as $key => $value)
                                                    @if($value->type == 1)
                                                        <li data-id="{{ $value->id }}"> 
                                                            <a class="deleteRecord" data-id="{{ $value->id }}" style="margin-right: 10px; color: red;"><i class="fa fa-trash"></i></a>{{ $value->name }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
				                {!! Form::close() !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::open(array('route' => 'about-us.store','method'=>'POST','files'=>   'true','class'=>'form')) !!}
                                    <div>
                                        <h5>Suppliers</h5>
                                    </div>
                                    <input type="hidden" name="type" value="2">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" id="supplier-name">
                                                <span class="text-danger error-text name2_err"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary me-1 btn-client-list">Submit</button>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-12">
                                            @if(!empty($suppliers))
                                                <ul class="supplier-list-append p-0" id="sortable-2">
                                                @foreach ($suppliers as $key => $value)
                                                    @if($value->type == 2)
                                                        <li data-id="{{ $value->id }}">
                                                            <a class="deleteRecord" data-id="{{ $value->id }}" style="margin-right: 10px; color: red;"><i class="fa fa-trash"></i></a>{{ $value->name }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::open(array('route' => 'about-us.store','method'=>'POST','files'=>   'true','class'=>'form')) !!}
                                    <div>
                                        <h5>Recycling Facilities</h5>
                                    </div>
                                    <input type="hidden" name="type" value="3">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" id="recycing-facilities-name">
                                                <span class="text-danger error-text name3_err"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary me-1 btn-client-list">Submit</button>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-12">
                                            @if(!empty($recycingFacilities))
                                                <ul class="recycing-facilities-list-append p-0"  id="sortable-3">
                                                @foreach ($recycingFacilities as $key => $value)
                                                    @if($value->type == 3)
                                                        <li data-id="{{ $value->id }}">
                                                            <a class="deleteRecord" data-id="{{ $value->id }}" style="margin-right: 10px; color: red;"><i class="fa fa-trash"></i></a>{{ $value->name }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                {!! Form::close() !!}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript">
    $("#sortable").sortable({
        stop: function(event, ui) {
            var data = [];
            $('#sortable li').each(function() {
                console.log($(this).data('id'));
                data.push({ id:$(this).data('id'), order: $(this).index()+1});
            })
            updateOrderBy(data)
            // console.log('update: '+ui.item.index())
            // console.log(ui.item.data('id'));
        }
    });

    $("#sortable-2").sortable({
        stop: function(event, ui) {
            var data = [];
            $('#sortable-2 li').each(function() {
                console.log($(this).data('id'));
                data.push({ id:$(this).data('id'), order: $(this).index()+1});
            })
            updateOrderBy(data)
            // console.log('update: '+ui.item.index())
            // console.log(ui.item.data('id'));
        }
    });

    $("#sortable-3").sortable({
        stop: function(event, ui) {
            var data = [];
            $('#sortable-3 li').each(function() {
                console.log($(this).data('id'));
                data.push({ id:$(this).data('id'), order: $(this).index()+1});
            })
            updateOrderBy(data)
            // console.log('update: '+ui.item.index())
            // console.log(ui.item.data('id'));
        }
    });

    function updateOrderBy(data) {
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax(
        {
            url: "{{ route('aboutus.update.orderby') }}",
            type: 'POST',
            data: {
                data: data,
                _token: token,
            },
            success: function (data){
                toastr.success(data.success, 'Success Alert', {timeOut: 5000})
            }
        });
    }

    var aboutUs = {
        success: function(response)
        {
            $('.error-text').text('');
            if($.isEmptyObject(response.error)){
                $('#name').val('');
                $('#supplier-name').val('');
                $('#recycing-facilities-name').val('');
                if (response.data.type == 1) {
                    $('.client-list-append').append('<li data-id='+response.data.id+'><a class="deleteRecord" data-id='+response.data.id+' style="margin-right: 10px; color: red;"><i class="fa fa-trash"></i></a>'+response.data.name+'</li>');
                }else if(response.data.type == 2){
                    $('.supplier-list-append').append('<li data-id='+response.data.id+'><a class="deleteRecord" data-id='+response.data.id+' style="margin-right: 10px; color: red;"><i class="fa fa-trash"></i></a>'+response.data.name+'</li>');
                }else{
                    $('.recycing-facilities-list-append').append('<li data-id='+response.data.id+'><a class="deleteRecord" data-id='+response.data.id+' style="margin-right: 10px; color: red;"><i class="fa fa-trash"></i></a>'+response.data.name+'</li>');
                }
                toastr.success(response.success, 'Success Alert', {timeOut: 5000})
                // $('.success-error').removeClass();
                // window.location.href = response.redirectURL;
            }else{
                $.each( response.error, function( key, value ) {
                    $.each( value, function( skey, svalue ) {
                        if(response.data.type == 1){
                            $('.'+skey+'_err').text(svalue);
                        }else if(response.data.type == 2){
                            $('.'+skey+'2_err').text(svalue);
                        }else{
                            $('.'+skey+'3_err').text(svalue);
                        }
                    });
                });
            }
        }
    };

    $('body').on('click','.btn-client-list',function (e) {
        e.preventDefault();
        // $(this).attr("disabled", true);
        // $(this).html('<i class="fa fa-spinner fa-spin"></i> Save.');
        
        $(this).parents("form").ajaxSubmit(aboutUs);
    });

    


    $('body').on('click','.deleteRecord',function (e) {
        var currentObj = $(this);
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
       
        $.ajax(
        {
            url: "/admin/about-us/"+id,
            type: 'DELETE',
            data: {
                id: id,
                _token: token,
            },
            success: function (data){
                currentObj.parents("li").remove();
                toastr.success(data.success, 'Success Alert', {timeOut: 5000})
            }
        });
       
    })


</script>	
@endsection
