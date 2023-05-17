<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Grocery Shoppy an Ecommerce Category Bootstrap Responsive Web Template | Home :: w3layouts</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

@include('frontTheme.style')
@yield('styles')
</head>

<body>
	<!-- top-header -->
	@include('frontTheme.header')
	<!-- //navigation -->
	<!-- banner -->
	@yield('content')
	<!-- //newsletter -->
	<!-- footer -->
	@include('frontTheme.footer')
	<!-- //copyright -->

	<!-- js-files -->
	@include('frontTheme.script')
	<!-- //js-files -->

	<!-- js-defalut -->
	@yield('scripts')
	<!-- js-defalut-->
<script type="text/javascript">
	
	$(".view").click(function() {
		
  		var id = $('.view :selected').attr(id);
  		alert(id);

  		$.ajax({
            url: "/category-value/", 
            method: "POST",  
            data:{id:id},  
            success:function(data){
               $('#show_category').html(data);  
           }  

       });  
	});
</script>
</body>

</html>
