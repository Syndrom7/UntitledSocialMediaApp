@extends('layouts.master')
@section('contents')
  <!-- Container START -->
  <div class="container">
    <div class="row">

      <!-- Sidenav START -->
      <div class="col-lg-3">

        <!-- Advanced filter responsive toggler START -->
				<!-- Divider -->
				<div class="d-flex align-items-center mb-4 d-lg-none">
					<button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
						<i class="btn btn-primary fw-bold fa-solid fa-sliders"></i>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">Settings</span>
					</button>
				</div>
				<!-- Advanced filter responsive toggler END -->

        <nav class="navbar navbar-light navbar-expand-lg mx-0">
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
            <!-- Offcanvas header -->
						<div class="offcanvas-header">
							<button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>

            <!-- Offcanvas body -->
            <div class="offcanvas-body p-0">
              <!-- Card START -->
              <div class="card w-100">
                <!-- Card body START -->
                <div class="card-body">

                <!-- Side Nav START -->
                <ul class="nav nav-tabs nav-pills nav-pills-soft flex-column fw-bold gap-2 border-0">
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0 active" href="#nav-setting-tab-1" data-bs-toggle="tab"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/person-outline-filled.svg" alt=""><span>Account </span></a>
                  </li>
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0" href="#nav-setting-tab-6" data-bs-toggle="tab"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/trash-var-outline-filled.svg" alt=""><span>Close account </span></a>
                  </li>
                </ul>
                <!-- Side Nav END -->

              </div>
              <!-- Card body END -->
              <!-- Card footer -->
              <div class="card-footer text-center py-2">
                <a class="btn btn-link text-secondary btn-sm" href="#!">View Profile </a>
              </div>
              </div>
            <!-- Card END -->
            </div>
            <!-- Offcanvas body -->
          </div>
        </nav>
      </div>
      <!-- Sidenav END -->

        <!-- Main content START -->
        <div class="col-lg-6 vstack gap-4">
          <!-- Setting Tab content START -->
          <div class="tab-content py-0 mb-0">

            <!-- Account setting tab START -->
            <div class="tab-pane show active fade" id="nav-setting-tab-1">
              <!-- Account settings START -->
              <div class="card mb-4">
                
                <!-- Title START -->
                <div class="card-header border-0 pb-0">
                  <h1 class="h5 card-title">Account Settings</h1>
                  <p class="mb-0">He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty  assistance joy. Unaffected at ye of compliment alteration to.</p>
                </div>
                <!-- Card header START -->
                <!-- Card body START -->

                <div class="card-body">
                  <!-- Form settings START -->
                  <form action="/settings/update/" method="POST" class="row g-3">
                    @csrf
                    <!-- First name -->
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <div class="col-sm-6 col-lg-4">
                      <label class="form-label">First name</label>
                      <input type="text" class="form-control" placeholder="Sam" value="{{ Auth::user()->first_name }}" name="first_name">
                    </div>
                    <!-- Last name -->
                    <div class="col-sm-6 col-lg-4">
                      <label class="form-label">Last name</label>
                      <input type="text" class="form-control" placeholder="Lanson" name="last_name" value="{{ Auth::user()->last_name }}">
                    </div>
                    <!-- Occupation -->
                    <div class="col-sm-6 col-lg-3">
                      <label class="form-label">Occupation</label>
                      <input type="text" class="form-control" placeholder="Lead Developer" value="{{ Auth::user()->occupation }}" name="occupation">
                    </div>
                    <!-- User name -->
                    <div class="col-sm-6">
                      <label class="form-label">Address</label>
                      <input type="text" class="form-control" placeholder="Abs Street 123" value="{{ Auth::user()->address }}" name="address">
                    </div>
                    <!-- Birthday -->
                    <div class="col-lg-6">
                      <label class="form-label">Birthday </label>
                      <input type="text" class="form-control flatpickr" id="datepicker" placeholder="12/12/1990" value="{{ Auth::user()->birthday }}" name="birthday">
                    </div>
                    <!-- Phone number -->
                    <div class="col-sm-6">
                      <label class="form-label">Phone number</label>
                      <input type="text" class="form-control" placeholder="(678) 324-1251" value="{{ Auth::user()->phone }}" name="phone">
                    </div>
                    <!-- Phone number -->
                    <div class="col-sm-6">
                      <label class="form-label">Email</label>
                      <input type="text" class="form-control" placeholder="sam@webestica.com" value="{{ Auth::user()->email }}" name="email">
                    </div>
                    <!-- Button  -->
                    <div class="col-12 text-end">
                      <button type="submit" class="btn btn-sm btn-primary mb-0">Save changes</button>
                    </div>
                  </form>
                  <!-- Settings END -->
                </div>
              <!-- Card body END -->
              </div>
              <!-- Account settings END -->

            </div>
            <!-- Account setting tab END -->

            <!-- Close account tab START -->
            <div class="tab-pane fade" id="nav-setting-tab-6">
              <!-- Card START -->
              <div class="card">
                <!-- Card header START -->
                <div class="card-header border-0 pb-0">
                  <h5 class="card-title">Delete account</h5>
                  <p class="mb-0">He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty gay assistance joy. Unaffected at ye of compliment alteration to.</p>
                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                  <!-- Delete START -->
                  <h6>Before you go...</h6>
                  <ul>
                    <li>Take a backup of your data <a href="#">Here</a> </li>
                    <li>If you delete your account, you will lose your all data.</li>
                  </ul>
                  <div class="form-check form-check-md my-4">
                    <input class="form-check-input" type="checkbox" value="" id="deleteaccountCheck">
                    <label class="form-check-label" for="deleteaccountCheck">Yes, I'd like to delete my account</label>
                  </div>
                  <a href="/settings/destroy" class="btn btn-danger btn-sm mb-0">Delete my account</a>
                  <!-- Delete END -->
                </div>
              <!-- Card body END -->
              </div>
              <!-- Card END -->
            </div>
            <!-- Close account tab END -->

          </div>
          <!-- Setting Tab content END -->
        </div>

    </div> <!-- Row END -->
  </div>


  @if(session('accountDeleted'))
        <script>
          var notyf = new Notyf({
            duration: 3000,
            position: {
              x: 'right',
              y: 'top',
            },
          });
         notyf.error('Your account have been successfully deleted!');       
      </script>
  @endif
  @if(session('settingsChanged'))
        <script>
          var notyf = new Notyf({
            duration: 3000,
            position: {
              x: 'right',
              y: 'top',
            },
          });
         notyf.success('Your changes have been successfully saved!');       
      </script>
  @endif
  <!-- Container END -->
@endsection
</main>
<!-- **************** MAIN CONTENT END **************** -->

@section('modals')
@endsection


@section('body-extra')
@endsection
