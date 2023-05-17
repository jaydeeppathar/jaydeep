@extends($frontTheme)

@section('content')
<div class="ads-grid">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l">Products
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<!-- product right -->
		<div class="agileinfo-ads-display col-md-12">
            <div class="m-4" style="border:solid 1px black; margin: 10px;">
                @foreach($subcategorys as $subcategory)
                    @if ($categorys->id == $subcategory->category->id)
                        <a href="{{ route('product.page', $subcategory->id) }}">
                            <h4 style="margin: 5px; border: solid 1px black; display: inline-block; padding: 5px;">{{ $subcategory->sub_category_name }}</h4>    
                        </a>
                    @endif
                @endforeach                   
            </div>
			<div class="wrapper">
				<!-- first section (nuts) -->
				<div class="product-sec1">
					<h3 class="heading-tittle">{{ $categorys->name }}</h3>
					  	@foreach ($products as $product)
                            @if ($categorys->name == $product->category->name)
                                <div class="col-md-4 product-men">	
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item">
                                            <img src="{{ asset('upload/product/'.$product->image) }}" alt="" height="120px" width="130px">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{ route('product.detail', $product->slug) }}" class="link-product-add-cart view" id="{{ $product->id }}">Quick View</a>
                                                </div>
                                            </div>
                                            <span class="product-new-top">New</span>
                                        </div>
                                        <div class="item-info-product">
                                            <h4>
                                                <a href="single.html">{{ $product->product_name }}</a>
                                            </h4>
                                            <div class="info-product-price">
                                                <span class="item_price">{{ $product->price }}</span>
                                                <del>{{ $product->discount }}</del>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-block add-cart-btn text-center" role="button">Add to cart</a> </p>                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
					<div class="clearfix"></div>
				</div>
				<!-- //first section (nuts) -->
			</div>
		</div>
		<!-- //product right -->
	</div>
</div>
@endsection