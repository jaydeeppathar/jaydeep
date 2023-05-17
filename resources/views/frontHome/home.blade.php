@extends($frontTheme)

@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Big
                            <span>Save</span>
                        </h3>
                        <p>Get flat
                            <span>10%</span> Cashback</p>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
            <div class="item item2">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Healthy
                            <span>Saving</span>
                        </h3>
                        <p>Get Upto
                            <span>30%</span> Off</p>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
            <div class="item item3">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Big
                            <span>Deal</span>
                        </h3>
                        <p>Get Best Offer Upto
                            <span>20%</span>
                        </p>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
            <div class="item item4">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Today
                            <span>Discount</span>
                        </h3>
                        <p>Get Now
                            <span>40%</span> Discount</p>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- //banner -->

    <!-- top Products -->
    <div class="ads-grid">
        <div class="container">
            <h3 class="tittle-w3l"> {{ frontSetting('our-top-products-title') }}
            <!-- tittle heading -->
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <!-- product left -->
            <div class="side-bar col-md-3">
                <!-- cuisine -->
                <div class="left-side">
                    <h3 class="agileits-sear-head">All Product</h3>
                     @foreach($allCategorys as $category)
                    <div class="blo-top">
                        <li><a href="{{ route('product', $category->id) }}">{{ $category->name }}</a></li>
                    </div>
                    @endforeach
                </div>
                <!-- //cuisine -->
                <!-- deals -->
                <div class="deal-leftmk left-side"> 
                    <h3 class="agileits-sear-head">Latest Products</h3>
                    @foreach($latestProducts as $product)
                    <div class="special-sec1">
                        <div class="col-xs-4 img-deals">
                            <img src="{{ asset('upload/product/' .$product->image) }}" height="60px" width="70px" alt="">
                        </div>
                        <div class="col-xs-8 img-deal1">
                            <h3>{{ $product->product_name }}</h3>
                            <a href="single.html">{{ $product->price }}</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
                </div>
                <!-- //deals -->
            </div>
            <!-- //product left -->
            <!-- product right -->
            <div class="agileinfo-ads-display col-md-9">
                    <!-- first section (nuts) -->
                    {{-- expr --}}
                <div class="wrapper">
                @foreach ($categorys as $category)
                    <div class="product-sec1">
                        <h3 class="heading-tittle" id="{{ $category->id }}">{{ $category->name }}</h3>
                        @foreach ($products as $product)
                            @if ($category->name == $product->category->name)
                                <div class="col-md-4 product-men">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item">
                                            <img src="{{ asset('upload/product/'.$product->image) }}" alt="" height="110px" width="130px">
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
                                                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn add-cart-btn btn-block text-center" role="button">Add to cart</a> </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                @endforeach                
                </div>
            </div>
            <!-- //product right -->
        </div>
    </div>
    <!-- //top products -->
    <!-- special offers -->
    <div class="featured-section" id="SpecialOffers">
        <div class="container" id="">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Special Offers
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <div class="content-bottom-in">
                <ul id="flexiselDemo1">
                    @foreach($products as $product)
                    <li>
                        <div class="w3l-specilamk">
                            <div class="speioffer-agile">
                                <a href="single.html">
                                    <img src="{{ asset('upload/product/' .$product->image) }}" height="100px" width="140px" alt="">
                                </a>
                            </div>
                            <div class="product-name-w3l">
                                <h4>
                                    <a href="single.html">Aashirvaad, 5g</a>
                                </h4>
                                <div class="w3l-pricehkj">
                                    <h6>$220.00</h6>
                                    <p>Save $40.00</p>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn add-cart-btn btn-block text-center" role="button">Add to cart</a> </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- //special offers -->
    <!-- newsletter -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="col-xs-8 agile-leftmk">
                <h2>Get your Groceries delivered from local stores</h2>
                <p>Free Delivery on your first order!</p>
                <form action="#" method="post">
                    <input type="email" placeholder="E-mail" name="email" required="">
                    <input type="submit" value="Subscribe">
                </form>
                <div class="newsform-w3l">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
            </div>
            <div class="col-xs-4 w3l-rightmk">
                <img src="frontTheme/images/tab3.png" alt=" ">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection