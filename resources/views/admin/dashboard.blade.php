@extends($adminTheme)

@section("title")
Dashboard
@endsection

@section("style")
<style type="text/css">
  .icon{
    font-size: 25px;
  }
</style>
@endsection
@section("wrapper")
    <section id="dashboard-ecommerce">
      <div class="row match-height">

        <!-- Statistics Card -->
        <div class="col-xl-12 col-md-6 col-12">
          <div class="card card-statistics">
            <div class="card-header">
              <h4 class="card-title">Dashboard</h4>
              <div class="d-flex align-items-center">
                <p class="card-text font-small-2 me-25 mb-0">Updated Now</p>
              </div>
            </div>
            <div class="card-body statistics-body">
              <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                  <div class="d-flex flex-row">
                    <div class="avatar bg-light-primary me-2">
                      <div class="avatar-content">
                        <i data-feather="user" class="avatar-icon"></i>
                      </div>
                    </div>
                    <div class="my-auto">
                      <h4 class="fw-bolder mb-0"></h4>
                      <p class="card-text font-small-3 mb-0"><a href="">Admins</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                  <div class="d-flex flex-row">
                    <div class="avatar bg-light-primary me-2">
                      <div class="avatar-content">
                        <!-- <i data-feather="user" class="avatar-icon"></i> -->
                        <i class="fa fa-phone icon" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="my-auto">
                      <h4 class="fw-bolder mb-0"></h4>
                      <p class="card-text font-small-3 mb-0"><a href="">Contact US</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                  <div class="d-flex flex-row">
                    <div class="avatar bg-light-primary me-2">
                      <div class="avatar-content">
                        <!-- <i data-feather="user" class="avatar-icon"></i> -->
                        <i class="fa fa-cog icon" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="my-auto">
                      <h4 class="fw-bolder mb-0"></h4>
                      <p class="card-text font-small-3 mb-0"><a href="">Services</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                  <div class="d-flex flex-row">
                    <div class="avatar bg-light-primary me-2">
                      <div class="avatar-content">
                        <i class="fa fa-building-o icon" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="my-auto">
                      <h4 class="fw-bolder mb-0"></h4>
                      <p class="card-text font-small-3 mb-0"><a href="">Offices</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Statistics Card -->
      </div>
    </section>
@endsection
    
{{-- @section("script")
@endsection --}}