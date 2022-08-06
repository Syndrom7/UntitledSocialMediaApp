<!DOCTYPE html>
<html lang="en">
<head>
	<title>Untitled</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Google Font -->
    <link rel="preconnect" href="assets/fonts/fonts.googleapis.com/index.html">

	<!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
  <!-- Notify plugin CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
  <!-- DatePicker Calender CSS & JS-->
    <link href="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
  <!-- Bootstrap icons CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/choices.js/public/assets/styles/choices.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/flatpickr/dist/flatpickr.css" />
  <!-- FilePond CSS -->
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
  <!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="assets/css/style.css">
    
</head>

<body>

<!-- =======================
Header START -->
<header class="navbar-light fixed-top header-static bg-mode">

	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand" href="{{url('/')}}">
                <i class="bi bi-hand-thumbs-up"></i>
                
			</a>
			<!-- Logo END -->

			<!-- Main navbar START -->
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav navbar-nav-scroll ms-auto">
					<!-- Nav item 4 Mega menu -->
					<li class="nav-item">
						<a class="nav-link" href="{{url('/')}}">My Home</a>
					</li>
				</ul>
			</div>
			<!-- Main navbar END -->

			<!-- Nav right START -->
			<ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
        <li class="nav-item ms-2">
					<a class="nav-link icon-md btn btn-light p-0" href="{{url('settings')}}">
						<i class="bi bi-gear-fill fs-6"> </i>
					</a>
				</li>
        <li class="nav-item ms-2 dropdown">
					<a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-2" src="{{ url(Auth::user()->image) }}" alt="">
					</a>
          <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
            <!-- Profile info -->
            <li class="px-3">
              <div class="d-flex align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar me-3">
                  <img class="avatar-img rounded-circle" src="{{ url(Auth::user()->image) }}" alt="avatar">
                </div>
                <div>
                  <a class="h6 stretched-link" href="#">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                  <p class="small m-0">{{ Auth::user()->occupation }}</p>
                </div>
              </div>

            </li>
            <!-- Links -->  
  
            {{-- Log out button start --}}
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             <i class="bi bi-power fa-fw me-2"></i>{{ __('Sign Out') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
            </form>
            {{-- Log out button end --}}
            <li> <hr class="dropdown-divider"></li>
          </ul>
				</li>
			  <!-- Profile START -->
        
			</ul>
			<!-- Nav right END -->
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- =======================
Header END -->
<!-- **************** MAIN CONTENT START **************** -->
<main>
    @yield('contents')
</main>
<!-- **************** MAIN CONTENT END **************** -->

@yield('modals')
<!-- Modal login activity START -->
    <div class="modal fade" id="modalLoginActivity" tabindex="-1" aria-labelledby="modalLabelLoginActivity" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <!-- Modal header -->
        <div class="modal-header">
            <h5 class="modal-title" id="modalLabelLoginActivity">Where You're Logged in </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul class="list-group list-group-flush">
            <!-- location list item -->
            <li class="list-group-item d-flex justify-content-between align-items-center px-0 pb-3">
                <div class="me-2">
                <h6 class="mb-0">London, UK</h6>
                <ul class="nav nav-divider small">
                    <li class="nav-item">Active now </li>
                    <li class="nav-item">This Apple iMac </li>
                </ul>
                </div>
                
                <button class="btn btn-sm btn-primary-soft"> Logout </button>
            </li>
            <!-- location list item -->
            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                <div class="me-2">
                <h6 class="mb-0">California, USA</h6>
                <ul class="nav nav-divider small">
                    <li class="nav-item">Active now </li>
                    <li class="nav-item">This Apple iMac </li>
                </ul>
                </div>
                <button class="btn btn-sm btn-primary-soft"> Logout </button>
            </li>
            <!-- location list item -->
            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                <div class="me-2">
                <h6 class="mb-0">New york, USA</h6>
                <ul class="nav nav-divider small">
                    <li class="nav-item">Active now </li>
                    <li class="nav-item">This Windows </li>
                </ul>
                </div>
                <button class="btn btn-sm btn-primary-soft"> Logout </button>
            </li>
            <!-- location list item -->
            <li class="list-group-item d-flex justify-content-between align-items-center px-0 pt-3">
                <div class="me-2">
                <h6 class="mb-0">Mumbai, India</h6>
                <ul class="nav nav-divider small">
                    <li class="nav-item">Active now </li>
                    <li class="nav-item">This Windows </li>
                </ul>
                </div>
                <button class="btn btn-sm btn-primary-soft"> Logout </button>
            </li>
            </ul>
        </div>
        </div>
    </div>
    </div>
<!-- Modal login activity END -->
<!-- **************** MAIN CONTENT END **************** -->

  <!-- Modal create Feed photo START -->
  <div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal feed header START -->
        <div class="modal-header">
          <h5 class="modal-title" id="feedActionPhotoLabel">Add post photo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal feed header END -->
  
          <!-- Modal feed body START -->
          <div class="modal-body">
          <!-- Add Feed -->
          <div class="d-flex mb-3">
            <!-- Avatar -->
            <div class="avatar avatar-xs me-2">
              <img class="avatar-img rounded-circle" src="{{ url(Auth::user()->image) }}" alt="">
            </div>
            <form class="w-100" method="POST" action="{{url('/create')}}" enctype="multipart/form-data">
              @csrf
            <!-- Feed box  -->
            
              <textarea name="post-text" class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
            
          </div>
  
          <!-- Dropzone photo START -->
          <div>
            <label class="form-label">Upload attachment</label>
            <div class="dropzone dropzone-default card shadow-none">
              <div class="dz-message">
                <input type="file" name="post-img" id="">
              </div>
            </div>
          </div>

          <!-- Dropzone photo END -->
  
          </div>
          <!-- Modal feed body END -->
  
          <!-- Modal feed footer -->
          <div class="modal-footer ">
            <!-- Button -->
              <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success-soft">Post</button>
          </div>
        </form>
          <!-- Modal feed footer -->
      </div>
    </div>
  </div>
  <!-- Modal create Feed photo END -->


  <!-- Modal update Feed photo START -->
  <div class="modal fade" id="feedUpdatePhoto" tabindex="-1" aria-labelledby="feedUpdatePhotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal feed header START -->
        <div class="modal-header">
          <h5 class="modal-title" id="feedUpdatePhotoLabel">Update post</h5>
          
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal feed header END -->
  
          <!-- Modal feed body START -->
          <div class="modal-body">
          <!-- Add Feed -->
          <div class="d-flex mb-3">
            <!-- Avatar -->
            <div class="avatar avatar-xs me-2">
              <img class="avatar-img rounded-circle" src="{{ url(Auth::user()->image) }}" alt="">
            </div>
            <form class="w-100" method="POST" action="{{url('/update')}}" enctype="multipart/form-data">
              @csrf
            <!-- Feed box  -->
            <input id="feed_id" value="" name="updateID" type="hidden">
              <textarea name="post-text" id="updateTextarea" class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
          </div>
          <!-- Dropzone photo START -->
          <div>
            <label class="form-label">Upload attachment</label>
            <div class="dropzone dropzone-default card shadow-none">
              <div class="dz-message">
                <input type="file" name="post-img" id="">
              </div>
            </div>
          </div>

          <!-- Dropzone photo END -->
  
          </div>
          <!-- Modal feed body END -->
  
          <!-- Modal feed footer -->
          <div class="modal-footer ">
            <!-- Button -->
              <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success-soft">Post</button>
          </div>
        </form>
          <!-- Modal feed footer -->
      </div>
    </div>
  </div>
  <!-- Modal update Feed photo END -->






  <!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Vendors -->
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Template Functions -->
<script src="assets/js/functions.js"></script>
<script>
  //the onclick fires and passes the post id
  //takes the post id and set the hidden input value to post id
  function getPostUpdateID(id,text) {
    document.getElementById('feed_id').setAttribute('value', id);
    document.getElementById('updateTextarea').value = text;
  }
</script>
@yield('body-extra')

@if(session('notify'))
  <script>
    var notyf = new Notyf({
      duration: 3000,
      position: {
        x: 'right',
        y: 'top',
      },
    });
    notyf.success('{{session('notify')}}');       
  </script>
@endif
</body>
</html>