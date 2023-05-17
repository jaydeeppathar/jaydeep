<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title></title>
</head>
<body>
    <div class="container-fluid mt-3">
            <div class="card">
                <div class="card-body">
                    {{-- {!! Form::open(['id' => 'formId']) !!} --}}
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">                                    
                                    {{ Form::label('name','Name') }}<span class="text-danger">*</span>
                                    {!! Form::Text('name', null, array('class' => 'form-control name' ,'id' => 'myName', 'placeholder'=>'Name')) !!}
                                </div>
                                <div class="form-group">                                    
                                    {{ Form::label('color','Color') }}<span class="text-danger">*</span>                                    
                                    {!! Form::select('color', [ '' => '---Select---', 'red' => 'Red', 'blue' => 'Blue', 'green' => 'Green'], null, array('class' => 'form-control form-select color', 'id' => 'myColor',)) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('code','Code') }}<span class="text-danger">*</span>
                                    {!! Form::number('code', null, array('class' => 'form-control code','id' => 'myCode', 'placeholder'=>'Code')) !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('qty','Qty') }}<span class="text-danger">*</span>
                                    {!! Form::number('qty', null, array('class' => 'form-control qty','id' => 'myQty', 'placeholder'=>'Qty')) !!}
                                </div>
                            </div>                            
                        </div>
                        <div class="row">                            
                            <div class="col-md-12 text-center mt-3  ">
                                {{-- {{ Form::button('Save',['class' => 'product btn btn-success ',]) }} --}}
                                  <P><button type="button" class="btn btn-success" id="add-product"><i class="fa-solid fa-plus"></i>Add</button>
                            </div>                            
                        </div>
                    {{-- {!! Form::close() !!} --}}
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('route' => 'addproduct.store','method'=>'POST','files'=>'true','class'=>'form')) !!}
                    <table class="myTable table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Color</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="displayArea">
                            
                        </tbody>
                    </table>
                        <div class="text-center">
                            <button class="btn btn-success save-data">Save</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
<script type="text/javascript">
$('#add-product').on('click', function(){   
    var name = $('.name').val();
    var color = $('.color').val();
    var code = $('.code').val();
    var qty = $('.qty').val();        
    var count = $('.myTable tr').length;
    if(!name){        
        alert('Please Enter The Name');
    } else{
        $('tbody').append('<tr class="child"><td>'+count+'</td><td class = "tr-name"><input type="text" name = "product['+count+'][name]" value="'+name+'" class="form-control"></td><td class="tr-code"><input type="number" name = "product['+count+'][code]" value="'+code+'" class="form-control"></td><td class = "tr-color"><input type="text" name = "product['+count+'][color]" value="'+color+'" class="form-control"></td><td class = "tr-qty"><input type="number" name = "product['+count+'][qty]" value="'+qty+'" class="form-control"></td><td><button class=" edit-btn btn btn-info">Edit</button></td></tr>');
        $("#formId")[0].reset();        
    }
    
});
$(document).on('click', '.edit-btn', function(){      
    var  name = $(this).parents('tr').find('.tr-name').text();
    var  code = $(this).parents('tr').find('.tr-code').text();
    var  color = $(this).parents('tr').find('.tr-color').text();
    var  qty = $(this).closest('tr').find('.tr-qty').text();
    console.log(qty);
    $('.name').val(name);
    $('.color').val(color);
    $('.code').val(code);
    $('.qty').val(qty);
    
}); 

$(document).on('click', '.save-data', function(){ 
	alert('hiii');     
    var  name = $(this).parents('tr').find('.tr-name').text();
    var  code = $(this).parents('tr').find('.tr-code').text();
    var  color = $(this).parents('tr').find('.tr-color').text();
    var  qty = $(this).closest('tr').find('.tr-qty').text();
    
    
    
}); 

</script>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</html>
      <!-- main row -->
        
        

       