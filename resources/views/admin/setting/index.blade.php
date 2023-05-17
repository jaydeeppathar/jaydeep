@extends($adminTheme)

@section("title")
Setting
@endsection

@section("style")
  <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/plugins/forms/form-validation.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/assets/css/style.css') }}">
@endsection   

@section("wrapper")
  <section class="app-user-list">
        <!-- list and filter start -->
       {{--  <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><span class="fw-bold">Home</span></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-history-tab" data-bs-toggle="pill" data-bs-target="#history" type="button" role="tab" aria-controls="pills-history" aria-selected="true"><span class="fw-bold">History</span></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-services-tab" data-bs-toggle="pill" data-bs-target="#materials" type="button" role="tab" aria-controls="pills-services" aria-selected="true"><span class="fw-bold">Materials</span></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-about-us-tab" data-bs-toggle="pill" data-bs-target="#about-us" type="button" role="tab" aria-controls="pills-about-us" aria-selected="true"><span class="fw-bold">About Us</span></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-projects-tab" data-bs-toggle="pill" data-bs-target="#projects" type="button" role="tab" aria-controls="pills-projects" aria-selected="true"><span class="fw-bold">Projects</span></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-service-areas-tab" data-bs-toggle="pill" data-bs-target="#service-areas" type="button" role="tab" aria-controls="pills-service-areas" aria-selected="true"><span class="fw-bold">Service Areas</span></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-us-tab" data-bs-toggle="pill" data-bs-target="#contact-us" type="button" role="tab" aria-controls="pills-contact-us" aria-selected="true"><span class="fw-bold">Contact Us</span></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-us-tab" data-bs-toggle="pill" data-bs-target="#services" type="button" role="tab" aria-controls="pills-contact-us" aria-selected="true"><span class="fw-bold">Services</span></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-us-tab" data-bs-toggle="pill" data-bs-target="#meta-setting" type="button" role="tab" aria-controls="pills-contact-us" aria-selected="true"><span class="fw-bold">Meta Setting</span></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-us-tab" data-bs-toggle="pill" data-bs-target="#driver-applications-mail-setting" type="button" role="tab" aria-controls="pills-contact-us" aria-selected="true"><span class="fw-bold">Driver Applications Setting</span></button>
          </li>
        </ul> --}}

         {!! Form::open(array('route' => 'settings.update','autocomplete'=>'off','files'=>'true')) !!}
         @csrf
        <div class="tab-content" id="pills-tabContent">

          <!-- Home  -->
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Header</h4>
              </div>
              <div class="card-body py-2 my-25">
                  {{-- <p class="fw-bolder">Header:</p> --}}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $setting['our-top-products-title']['name'] }}</label>
                        {!! Form::text($setting['our-top-products-title']['slug'], $setting['our-top-products-title']['value'], array('placeholder' => 'Enter Experience Title','class' => 'form-control')) !!}
                        @error('header-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                   {{--  </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['header-sub-title']['name'] }}</label>
                        {!! Form::text('header-sub-title',$settings['header-sub-title']['value'],['class' => 'form-control']) !!}
                        @error('header-sub-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['front-light-logo']['name'] }}<small class="text-danger">(100*81 pixels)</small></label>
                        {!! Form::file('front-light-logo',['class' => 'form-control']) !!}
                        @error('front-light-logo')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (!empty($settings['front-light-logo']['value']) )
                          <img src="{{ asset('uploads/setting/frontLightLogo/'.$settings['front-light-logo']['value']) }}" style="width: 100px;" class="mt-1">
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['front-white-logo']['name'] }}<small class="text-danger">(100*81 pixels)</small></label>
                        {!! Form::file('front-white-logo',['class' => 'form-control']) !!}
                        @error('front-white-logo')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (!empty($settings['front-white-logo']['value']) )
                          <img src="{{ asset('uploads/setting/frontWhiteLogo/'.$settings['front-white-logo']['value']) }}" style="width: 100px;" class="mt-1 bg-black">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['front-favicon']['name'] }}</label>
                        {!! Form::file('front-favicon',['class' => 'form-control']) !!}
                        @error('front-favicon')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (!empty($settings['front-favicon']['value']) )
                          <img src="{{ asset('uploads/setting/frontFavicon/'.$settings['front-favicon']['value']) }}" style="width: 100px;" class="mt-1">
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['background-image']['name'] }}<small class="text-danger">(1440*760 pixels)</small></label>
                        {!! Form::file('background-image',['class' => 'form-control']) !!}
                        @error('background-image')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (!empty($settings['background-image']['value']) )
                          <img src="{{ asset('uploads/setting/backgroundImage/'.$settings['background-image']['value']) }}" style="width: 100px;" class="mt-1">
                        @endif
                      </div>
                    </div>
                  </div>
              </div>
            </div> --}}
            {{-- <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">What we do</h4>
              </div>
              <div class="card-body py-2 my-25">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['what-we-do-name']['name'] }}</label>
                        {!! Form::text('what-we-do-name',$settings['what-we-do-name']['value'],['class' => 'form-control']) !!}
                        @error('what-we-do-name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['what-we-do-title']['name'] }}</label>
                        {!! Form::text('what-we-do-title',$settings['what-we-do-title']['value'],['class' => 'form-control']) !!}
                        @error('what-we-do-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Our Benefits</h4>
              </div>
              <div class="card-body py-2 my-25">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-name']['name'] }}</label>
                        {!! Form::text('our-benefits-name',$settings['our-benefits-name']['value'],['class' => 'form-control']) !!}
                        @error('our-benefits-name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-title']['name'] }}</label>
                        {!! Form::text('our-benefits-title',$settings['our-benefits-title']['value'],['class' => 'form-control']) !!}
                        @error('our-benefits-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-award']['name'] }}</label>
                        {!! Form::text('our-benefits-award',$settings['our-benefits-award']['value'],['class' => 'form-control']) !!}
                        @error('our-benefits-award')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-hart']['name'] }}</label>
                        {!! Form::text('our-benefits-hart',$settings['our-benefits-hart']['value'],['class' => 'form-control']) !!}
                        @error('our-benefits-hart')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-location']['name'] }}</label>
                        {!! Form::text('our-benefits-location',$settings['our-benefits-location']['value'],['class' => 'form-control']) !!}
                        @error('our-benefits-location')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-box1-title']['name'] }}</label>
                        {!! Form::text('our-benefits-box1-title',$settings['our-benefits-box1-title']['value'],['class' => 'form-control']) !!}
                        @error('our-benefits-box1-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-box2-title']['name'] }}</label>
                        {!! Form::text('our-benefits-box2-title',$settings['our-benefits-box2-title']['value'],['class' => 'form-control']) !!}
                        @error('our-benefits-box2-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-box1-cout']['name'] }}</label>
                        {!! Form::text('our-benefits-box1-cout',$settings['our-benefits-box1-cout']['value'],['class' => 'form-control']) !!}
                        @error('our-benefits-box1-cout')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-box2-cout']['name'] }}</label>
                        {!! Form::text('our-benefits-box2-cout',$settings['our-benefits-box2-cout']['value'],['class' => 'form-control']) !!}
                        @error('our-benefits-box2-cout')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-box1-Sub-title']['name'] }}</label>
                        {!! Form::text('our-benefits-box1-Sub-title',$settings['our-benefits-box1-Sub-title']['value'],['class' => 'form-control']) !!}
                        @error('our-benefits-box1-Sub-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-box2-Sub-title']['name'] }}</label>
                        {!! Form::text('our-benefits-box2-Sub-title',$settings['our-benefits-box2-Sub-title']['value'],['class' => 'form-control']) !!}
                        @error('our-benefits-box2-Sub-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>                    
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-image']['name'] }}<small class="text-danger">(470*604 pixels)</small></label>
                        {!! Form::file('our-benefits-image',['class' => 'form-control']) !!}
                        @error('our-benefits-image')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        @if (!empty($settings['our-benefits-image']['value']) )
                          <img src="{{ asset('uploads/setting/ourBenefitsImage/'.$settings['our-benefits-image']['value']) }}" style="width: 100px;" class="mt-1">
                        @endif
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['our-benefits-description']['name'] }}</label>
                        {!! Form::textarea('our-benefits-description',$settings['our-benefits-description']['value'],['class' => 'form-control description','rows'=> 2]) !!}
                        @error('our-benefits-description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Get in Touch</h4>
              </div>
              <div class="card-body py-2 my-25">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['get-in-touch-name']['name'] }}</label>
                        {!! Form::text('get-in-touch-name',$settings['get-in-touch-name']['value'],['class' => 'form-control']) !!}
                        @error('get-in-touch-name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['get-in-touch-title']['name'] }}</label>
                        {!! Form::text('get-in-touch-title',$settings['get-in-touch-title']['value'],['class' => 'form-control']) !!}
                        @error('get-in-touch-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['get-in-touch-description']['name'] }}</label>
                        {!! Form::textarea('get-in-touch-description',$settings['get-in-touch-description']['value'],['class' => 'form-control description','rows'=>2]) !!}
                        @error('get-in-touch-description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Follow us</h4>
              </div>
              <div class="card-body py-2 my-25">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['follow-us-name']['name'] }}</label>
                        {!! Form::text('follow-us-name',$settings['follow-us-name']['value'],['class' => 'form-control']) !!}
                        @error('follow-us-name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['follow-us-twitter']['name'] }}</label>
                        {!! Form::text('follow-us-twitter',$settings['follow-us-twitter']['value'],['class' => 'form-control']) !!}
                        @error('follow-us-twitter')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['follow-us-facebook']['name'] }}</label>
                        {!! Form::text('follow-us-facebook',$settings['follow-us-facebook']['value'],['class' => 'form-control']) !!}
                        @error('follow-us-facebook')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['follow-us-linkedin']['name'] }}</label>
                        {!! Form::text('follow-us-linkedin',$settings['follow-us-linkedin']['value'],['class' => 'form-control']) !!}
                        @error('follow-us-linkedin')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['follow-us-google+']['name'] }}</label>
                        {!! Form::text('follow-us-google+',$settings['follow-us-google+']['value'],['class' => 'form-control']) !!}
                        @error('follow-us-google+')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['follow-us-instagram']['name'] }}</label>
                        {!! Form::text('follow-us-instagram',$settings['follow-us-instagram']['value'],['class' => 'form-control']) !!}
                        @error('follow-us-instagram')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">About Allied</h4>
              </div>
              <div class="card-body py-2 my-25">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['about-allied-name']['name'] }}</label>
                        {!! Form::text('about-allied-name',$settings['about-allied-name']['value'],['class' => 'form-control']) !!}
                        @error('about-allied-name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['about-allied-description']['name'] }}</label>
                        {!! Form::textarea('about-allied-description',$settings['about-allied-description']['value'],['class' => 'form-control description','rows'=>2]) !!}
                        @error('about-allied-description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Administrative Office</h4>
              </div>
              <div class="card-body py-2 my-25">
                  <div class="row"> 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['administrative-office-name']['name'] }}</label>
                        {!! Form::text('administrative-office-name',$settings['administrative-office-name']['value'],['class' => 'form-control']) !!}
                        @error('administrative-office-name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['administrative-office-phone-number']['name'] }}</label>
                        {!! Form::text('administrative-office-phone-number',$settings['administrative-office-phone-number']['value'],['class' => 'form-control']) !!}
                        @error('administrative-office-phone-number')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['administrative-office-email']['name'] }}</label>
                        {!! Form::text('administrative-office-email',$settings['administrative-office-email']['value'],['class' => 'form-control']) !!}
                        @error('administrative-office-email')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['administrative-office-fax-number']['name'] }}</label>
                        {!! Form::text('administrative-office-fax-number',$settings['administrative-office-fax-number']['value'],['class' => 'form-control']) !!}
                        @error('administrative-office-fax-number')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['administrative-office-fax-location']['name'] }}</label>
                        {!! Form::textarea('administrative-office-fax-location',$settings['administrative-office-fax-location']['value'],['class' => 'form-control','rows' => 2]) !!}
                        @error('administrative-office-fax-location')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Business Hours</h4>
              </div>
              <div class="card-body py-2 my-25">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['business-hours-name']['name'] }}</label>
                        {!! Form::text('business-hours-name',$settings['business-hours-name']['value'],['class' => 'form-control']) !!}
                        @error('business-hours-name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['business-hours-monday-friday']['name'] }}</label>
                        {!! Form::text('business-hours-monday-friday',$settings['business-hours-monday-friday']['value'],['class' => 'form-control']) !!}
                        @error('business-hours-monday-friday')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['business-hours-monday-friday-time']['name'] }}</label>
                        {!! Form::text('business-hours-monday-friday-time',$settings['business-hours-monday-friday-time']['value'],['class' => 'form-control']) !!}
                        @error('business-hours-monday-friday-time')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['business-hours-saturday']['name'] }}</label>
                        {!! Form::text('business-hours-saturday',$settings['business-hours-saturday']['value'],['class' => 'form-control']) !!}
                        @error('business-hours-saturday')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['business-hours-saturday-time']['name'] }}</label>
                        {!! Form::text('business-hours-saturday-time',$settings['business-hours-saturday-time']['value'],['class' => 'form-control']) !!}
                        @error('business-hours-saturday-time')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['business-hours-sunday']['name'] }}</label>
                        {!! Form::text('business-hours-sunday',$settings['business-hours-sunday']['value'],['class' => 'form-control']) !!}
                        @error('business-hours-sunday')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['business-hours-sunday-time']['name'] }}</label>
                        {!! Form::text('business-hours-sunday-time',$settings['business-hours-sunday-time']['value'],['class' => 'form-control']) !!}
                        @error('business-hours-sunday-time')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Footer</h4>
              </div>
              <div class="card-body py-2 my-25">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['Footer-description']['name'] }}</label>
                        {!! Form::text('Footer-description',$settings['Footer-description']['value'],['class' => 'form-control']) !!}
                        @error('Footer-description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- History -->
          <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">History</h4>
              </div>
              <div class="card-body py-2 my-25">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['history-name']['name'] }}</label>
                        {!! Form::text('history-name',$settings['history-name']['value'],['class' => 'form-control']) !!}
                        @error('history-name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['history-path']['name'] }}</label>
                        {!! Form::text('history-path',$settings['history-path']['value'],['class' => 'form-control']) !!}
                        @error('history-path')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['history-quote']['name'] }}</label>
                        {!! Form::text('history-quote',$settings['history-quote']['value'],['class' => 'form-control']) !!}
                        @error('history-quote')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['history-title']['name'] }}</label>
                        {!! Form::text('history-title',$settings['history-title']['value'],['class' => 'form-control']) !!}
                        @error('history-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['history-image']['name'] }}<small class="text-danger">(770*489 pixels)</small></label>
                        {!! Form::file('history-image',['class' => 'form-control']) !!}
                        @error('history-image')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        @if (!empty($settings['history-image']['value']) )
                          <img src="{{ asset('uploads/setting/historyImage/'.$settings['history-image']['value']) }}" style="width: 100px;" class="mt-1">
                        @endif
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['history-description']['name'] }}</label>
                        {!! Form::textarea('history-description',$settings['history-description']['value'],['class' => 'form-control description','rows'=>2]) !!}
                        @error('history-description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['history-sub-title']['name'] }}</label>
                        {!! Form::text('history-sub-title',$settings['history-sub-title']['value'],['class' => 'form-control']) !!}
                        @error('history-sub-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['history-sub-title-description1']['name'] }}</label>
                        {!! Form::textarea('history-sub-title-description1',$settings['history-sub-title-description1']['value'],['class' => 'form-control description','rows'=>2]) !!}
                        @error('history-sub-title-description1')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['history-sub-title-description2']['name'] }}</label>
                        {!! Form::textarea('history-sub-title-description2',$settings['history-sub-title-description2']['value'],['class' => 'form-control description','rows'=>2]) !!}
                        @error('history-sub-title-description2')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- Materials -->
          <div class="tab-pane fade" id="materials" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Materials</h4>
              </div>
              <div class="card-body py-2 my-25">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['materials-name']['name'] }}</label>
                      {!! Form::text('materials-name',$settings['materials-name']['value'],['class' => 'form-control']) !!}
                      @error('materials-name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['materials-path']['name'] }}</label>
                      {!! Form::text('materials-path',$settings['materials-path']['value'],['class' => 'form-control']) !!}
                      @error('materials-path')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['materials-description1']['name'] }}</label>
                        {!! Form::textarea('materials-description1',$settings['materials-description1']['value'],['class' => 'form-control description','rows'=>2]) !!}
                        @error('materials-description1')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>    
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['materials-description2']['name'] }}</label>
                        {!! Form::textarea('materials-description2',$settings['materials-description2']['value'],['class' => 'form-control description','rows'=>2]) !!}
                        @error('materials-description2')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>    
                </div>
              </div>
            </div>
          </div>
          <!-- About Us -->
          <div class="tab-pane fade" id="about-us" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">About Us</h4>
              </div>
              <div class="card-body py-2 my-25">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['about-us-main-name']['name'] }}</label>
                      {!! Form::text('about-us-main-name',$settings['about-us-main-name']['value'],['class' => 'form-control']) !!}
                      @error('about-us-main-name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['about-us-path']['name'] }}</label>
                      {!! Form::text('about-us-path',$settings['about-us-path']['value'],['class' => 'form-control']) !!}
                      @error('about-us-path')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['about-us-title']['name'] }}</label>
                      {!! Form::text('about-us-title',$settings['about-us-title']['value'],['class' => 'form-control']) !!}
                      @error('about-us-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['about-us-sub-title']['name'] }}</label>
                      {!! Form::text('about-us-sub-title',$settings['about-us-sub-title']['value'],['class' => 'form-control']) !!}
                      @error('about-us-sub-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['about-us-quote']['name'] }}</label>
                      {!! Form::text('about-us-quote',$settings['about-us-quote']['value'],['class' => 'form-control']) !!}
                      @error('about-us-quote')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['about-us-name']['name'] }}</label>
                      {!! Form::text('about-us-name',$settings['about-us-name']['value'],['class' => 'form-control']) !!}
                      @error('about-us-name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['about-us-deparment']['name'] }}</label>
                      {!! Form::text('about-us-deparment',$settings['about-us-deparment']['value'],['class' => 'form-control']) !!}
                      @error('about-us-deparment')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['about-us-user-image']['name'] }}<small class="text-danger">(70*70 pixels)</small></label>
                      {!! Form::file('about-us-user-image',['class' => 'form-control']) !!}
                      @error('about-us-user-image')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      @if (!empty($settings['about-us-user-image']['value']) )
                        <img src="{{ asset('uploads/setting/aboutusUserImage/'.$settings['about-us-user-image']['value']) }}" style="width: 50px;" class="mt-1">
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['about-us-image']['name'] }}<small class="text-danger">(770*489 pixels)</small></label>
                      {!! Form::file('about-us-image',['class' => 'form-control']) !!}
                      @error('about-us-image')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      @if (!empty($settings['about-us-image']['value']) )
                        <img src="{{ asset('uploads/setting/aboutusImage/'.$settings['about-us-image']['value']) }}" style="width: 150px;" class="mt-1">
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['about-us-description1']['name'] }}</label>
                        {!! Form::textarea('about-us-description1',$settings['about-us-description1']['value'],['class' => 'form-control description','rows'=>2]) !!}
                        @error('about-us-description1')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>    
                </div>
                <div class="row mt-1">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['about-us-description2']['name'] }}</label>
                        {!! Form::textarea('about-us-description2',$settings['about-us-description2']['value'],['class' => 'form-control description','rows'=>2]) !!}
                        @error('about-us-description2')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>    
                </div>
              </div>
            </div>
          </div>
          <!-- Projects -->
          <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Projects</h4>
              </div>
              <div class="card-body py-2 my-25">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['project-name']['name'] }}</label>
                      {!! Form::text('project-name',$settings['project-name']['value'],['class' => 'form-control']) !!}
                      @error('project-name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['project-path']['name'] }}</label>
                      {!! Form::text('project-path',$settings['project-path']['value'],['class' => 'form-control']) !!}
                      @error('project-path')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['project-title']['name'] }}</label>
                      {!! Form::text('project-title',$settings['project-title']['value'],['class' => 'form-control']) !!}
                      @error('project-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['project-sub-title']['name'] }}</label>
                      {!! Form::textarea('project-sub-title',$settings['project-sub-title']['value'],['class' => 'form-control', 'rows' => '2']) !!}
                      @error('project-sub-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>  
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">{{ $settings['project-image']['name'] }}<small class="text-danger">(770*489 pixels)</small></label>
                        {!! Form::file('project-image',['class' => 'form-control']) !!}
                        @error('project-image')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (!empty($settings['project-image']['value']) )
                          <img src="{{ asset('uploads/setting/projectImage/'.$settings['project-image']['value']) }}" style="width: 100px;" class="mt-1">
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Service Areas -->
          <div class="tab-pane fade" id="service-areas" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Service Areas</h4>
              </div>
              <div class="card-body py-2 my-25">
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-area-name']['name'] }}</label>
                      {!! Form::text('service-area-name',$settings['service-area-name']['value'],['class' => 'form-control']) !!}
                      @error('service-area-name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-area-path']['name'] }}</label>
                      {!! Form::text('service-area-path',$settings['service-area-path']['value'],['class' => 'form-control']) !!}
                      @error('service-area-path')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['service-area-sub-title']['name'] }}</label>
                        {!! Form::textarea('service-area-sub-title',$settings['service-area-sub-title']['value'],['class' => 'form-control', 'rows' => '2']) !!}
                        @error('service-area-sub-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">{{ $settings['service-area-middle-title']['name'] }}</label>
                        {!! Form::textarea('service-area-middle-title',$settings['service-area-middle-title']['value'],['class' => 'form-control', 'rows' => '2']) !!}
                        @error('service-area-middle-title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-area-middle-sub-title']['name'] }}</label>
                      {!! Form::textarea('service-area-middle-sub-title',$settings['service-area-middle-sub-title']['value'],['class' => 'form-control', 'rows' => '2']) !!}
                      @error('service-area-middle-sub-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-area-name1']['name'] }}</label>
                      {!! Form::text('service-area-name1',$settings['service-area-name1']['value'],['class' => 'form-control']) !!}
                      @error('service-area-name1')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-area-name2']['name'] }}</label>
                      {!! Form::text('service-area-name2',$settings['service-area-name2']['value'],['class' => 'form-control']) !!}
                      @error('service-area-name2')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-area-phone1']['name'] }}</label>
                      {!! Form::text('service-area-phone1',$settings['service-area-phone1']['value'],['class' => 'form-control']) !!}
                      @error('service-area-phone1')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-area-phone2']['name'] }}</label>
                      {!! Form::text('service-area-phone2',$settings['service-area-phone2']['value'],['class' => 'form-control']) !!}
                      @error('service-area-phone2')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-area-email1']['name'] }}</label>
                      {!! Form::text('service-area-email1',$settings['service-area-email1']['value'],['class' => 'form-control']) !!}
                      @error('service-area-email1')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-area-email2']['name'] }}</label>
                      {!! Form::text('service-area-email2',$settings['service-area-email2']['value'],['class' => 'form-control']) !!}
                      @error('service-area-email2')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-area-image1']['name'] }}<small class="text-danger">(58*58 pixels)</small></label>
                      {!! Form::file('service-area-image1',['class' => 'form-control']) !!}
                      @error('service-area-image1')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      @if (!empty($settings['service-area-image1']['value']) )
                        <img src="{{ asset('uploads/setting/serviceAreaImage1/'.$settings['service-area-image1']['value']) }}" style="width: 50px;" class="mt-1">
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-area-image2']['name'] }}<small class="text-danger">(58*58 pixels)</small></label>
                      {!! Form::file('service-area-image2',['class' => 'form-control']) !!}
                      @error('service-area-image2')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      @if (!empty($settings['service-area-image2']['value']) )
                        <img src="{{ asset('uploads/setting/serviceAreaImage2/'.$settings['service-area-image2']['value']) }}" style="width: 50px;" class="mt-1">
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Contact Us -->
          <div class="tab-pane fade" id="contact-us" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Contact Us</h4>
              </div>
              <div class="card-body py-2 my-25">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['contact-us-name']['name'] }}</label>
                      {!! Form::text('contact-us-name',$settings['contact-us-name']['value'],['class' => 'form-control']) !!}
                      @error('contact-us-name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['contact-us-path']['name'] }}</label>
                      {!! Form::text('contact-us-path',$settings['contact-us-path']['value'],['class' => 'form-control']) !!}
                      @error('contact-us-path')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['contact-us-notify-mail']['name'] }}</label>
                      {!! Form::text('contact-us-notify-mail',$settings['contact-us-notify-mail']['value'],['class' => 'form-control']) !!}
                      @error('contact-us-notify-mail')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['contact-us-mailing-address']['name'] }}</label>
                      {!! Form::text('contact-us-mailing-address',$settings['contact-us-mailing-address']['value'],['class' => 'form-control']) !!}
                      @error('contact-us-mailing-address')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['contact-us-Location']['name'] }}</label>
                      {!! Form::text('contact-us-Location',$settings['contact-us-Location']['value'],['class' => 'form-control']) !!}
                      @error('contact-us-Location')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Services -->
          <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Services</h4>
              </div>
              <div class="card-body py-2 my-25">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['services-name']['name'] }}</label>
                      {!! Form::text('services-name',$settings['services-name']['value'],['class' => 'form-control']) !!}
                      @error('services-name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['services-path']['name'] }}</label>
                      {!! Form::text('services-path',$settings['services-path']['value'],['class' => 'form-control']) !!}
                      @error('services-path')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Meta Setting -->
          <div class="tab-pane fade" id="meta-setting" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Meta Setting</h4>
              </div>
              <div class="card-body py-2 my-25">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['home-meta-title']['name'] }}</label>
                      {!! Form::text('home-meta-title',$settings['home-meta-title']['value'],['class' => 'form-control']) !!}
                      @error('home-meta-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['history-meta-title']['name'] }}</label>
                      {!! Form::text('history-meta-title',$settings['history-meta-title']['value'],['class' => 'form-control']) !!}
                      @error('history-meta-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['services-meta-title']['name'] }}</label>
                      {!! Form::text('services-meta-title',$settings['services-meta-title']['value'],['class' => 'form-control']) !!}
                      @error('services-meta-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['materials-meta-title']['name'] }}</label>
                      {!! Form::text('materials-meta-title',$settings['materials-meta-title']['value'],['class' => 'form-control']) !!}
                      @error('materials-meta-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['service-areas-meta-title']['name'] }}</label>
                      {!! Form::text('service-areas-meta-title',$settings['service-areas-meta-title']['value'],['class' => 'form-control']) !!}
                      @error('service-areas-meta-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['about-us-meta-title']['name'] }}</label>
                      {!! Form::text('about-us-meta-title',$settings['about-us-meta-title']['value'],['class' => 'form-control']) !!}
                      @error('about-us-meta-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['projects-meta-title']['name'] }}</label>
                      {!! Form::text('projects-meta-title',$settings['projects-meta-title']['value'],['class' => 'form-control']) !!}
                      @error('projects-meta-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['contact-us-meta-title']['name'] }}</label>
                      {!! Form::text('contact-us-meta-title',$settings['contact-us-meta-title']['value'],['class' => 'form-control']) !!}
                      @error('contact-us-meta-title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Driver Applications Setting -->
          <div class="tab-pane fade" id="driver-applications-mail-setting" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card" id="header-section">
              <div class="card-header border-bottom">
                  <h4 class="card-title">Driver Applications Mail Setting</h4>
              </div>
              <div class="card-body py-2 my-25">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['miami']['name'] }}</label>
                      {!! Form::text('miami',$settings['miami']['value'],['class' => 'form-control']) !!}
                      @error('miami')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['palm-beach']['name'] }}</label>
                      {!! Form::text('palm-beach',$settings['palm-beach']['value'],['class' => 'form-control']) !!}
                      @error('palm-beach')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['tampa']['name'] }}</label>
                      {!! Form::text('tampa',$settings['tampa']['value'],['class' => 'form-control']) !!}
                      @error('tampa')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">{{ $settings['orlando']['name'] }}</label>
                      {!! Form::text('orlando',$settings['orlando']['value'],['class' => 'form-control']) !!}
                      @error('orlando')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
 --}}
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-1">Submit</button>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
        {!! Form::close() !!}
 <!-- list and filter end -->
    </section>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
      $('.description').summernote({
        height: 250,
      });
    });
</script> 
@endsection