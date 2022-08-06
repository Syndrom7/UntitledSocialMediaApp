@extends('layouts.master')
@section('contents')
  <!-- Container START -->
  <div class="container">
    <div class="row g-4">

      <!-- Sidenav START -->
      <div class="col-lg-3">

        <!-- Advanced filter responsive toggler START -->
        <div class="d-flex align-items-center d-lg-none">
          <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
            <i class="btn btn-primary fw-bold fa-solid fa-sliders-h"></i>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
          </button>
        </div>
        <!-- Advanced filter responsive toggler END -->
        
        <!-- Navbar START-->
        <nav class="navbar navbar-expand-lg mx-0"> 
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
            <!-- Offcanvas header -->
            <div class="offcanvas-header">
              <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- Offcanvas body -->
            <div class="offcanvas-body d-block px-2 px-lg-0">
              <!-- Card START -->
              <div class="card overflow-hidden">
                <!-- Cover image -->
                <div class="h-50px" style="background-image:url(assets/images/bg/01.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                  <!-- Card body START -->
                  <div class="card-body pt-0">
                    <div class="text-center">
                    <!-- Avatar -->
                    <div class="avatar avatar-lg mt-n5 mb-3">
                      <a href="#!"><img class="avatar-img rounded border border-white border-3" src="{{ url(Auth::user()->image ? Auth::user()->image : 'assets/images/avatar/07.jpg') }}" alt=""></a>
                    </div>
                    <!-- Info -->
                    <h5 class="mb-0"> <a href="#!">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a> </h5>
                    <small>{{ Auth::user()->occupation }}</small>
                    <p class="mt-3">I'd love to change the world, but they won't give me the source code.</p>

                    <!-- User stat START -->
                    <div class="hstack gap-2 gap-xl-3 justify-content-center">
                      <!-- User stat item -->
                      <div>
                        <h6 class="mb-0">{{$posts->count()}}</h6>
                        <small>Post</small>
                      </div>
                      <!-- Divider -->
                      <div class="vr"></div>
                      <!-- User stat item -->
                      <div>
                        <h6 class="mb-0">2.5K</h6>
                        <small>Followers</small>
                      </div>
                      <!-- Divider -->
                      <div class="vr"></div>
                      <!-- User stat item -->
                      <div>
                        <h6 class="mb-0">365</h6>
                        <small>Following</small>
                      </div>
                    </div>
                    <!-- User stat END -->
                  </div>

                  <!-- Divider -->
                  <hr>

                  <!-- Side Nav START -->
                  <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/')}}"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/home-outline-filled.svg" alt=""><span>Feed </span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('settings')}}"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/cog-outline-filled.svg" alt=""><span>Settings </span></a>
                    </li>
                  </ul>
                  <!-- Side Nav END -->
                </div>
                <!-- Card body END -->
                <!-- Card footer -->
              </div>
              <!-- Card END -->

            </div>
          </div>
        </nav>
        <!-- Navbar END-->
      </div>
      <!-- Sidenav END -->

      <!-- Main content START -->
      <div class="col-md-8 col-lg-6 vstack gap-4">

        <!-- Share feed START -->
        <div class="card card-body" style="flex: 0">
          <div class="d-flex mb-3">
            <!-- Avatar -->
            <div class="avatar avatar-xs me-2">
              <a href="#"> <img class="avatar-img rounded-circle" src="{{ url(Auth::user()->image) }}" alt=""> </a>
            </div>
            <!-- Post input -->
            <form class="w-100" method="POST" action="{{ url('/create') }}">
              @csrf
              <textarea name="post-text" class="form-control pe-4 border-0" rows="2" data-autoresize placeholder="Share your thoughts..." data-bs-toggle="modal" data-bs-target="#feedActionPhoto"></textarea>
            </form>
          </div>
        </div>
        <!-- Share feed END -->

        @foreach($posts as $key => $post)
        <!-- Card feed item START -->
        <div class="card">
          <!-- Card header START -->
          <div class="card-header border-0 pb-0">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar avatar-story me-2">
                  <a href="#!"> <img class="avatar-img rounded-circle" src="{{ url($post->user->image) }}" alt=""> </a>
                </div>
                <!-- Info -->
                <div>
                  <div class="nav nav-divider">
                    <h6 class="nav-item card-title mb-0"> <a href="#!"> {{ $post->user->first_name }} {{ $post->user->last_name }} </a></h6>
                    <span class="nav-item small"> {{$post->created_at->diffForHumans()}}</span>
                    <span class="nav-item small"> {{$post->id}}</span>
                  </div>
                  <p class="mb-0 small">{{ $post->user->occupation }}</p>
                </div>
              </div>
              <!-- Card feed action dropdown START -->
              <div class="dropdown">
                <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots"></i>
                </a>
                <!-- Card feed action dropdown menu -->
                @if(Auth::user()->id == $post->user_id)
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">

                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#feedUpdatePhoto" id="updatePost" onclick="getPostUpdateID('{{$post->id}}', '{{ $post->text }}')"> <i class="bi bi-pencil fa-fw pe-2"></i>Edit post</a></li>
                  <li><a class="dropdown-item" href="delete/{{$post->id}}"> <i class="bi bi-trash fa-fw pe-2"></i>Delete post</a></li>
                </ul>
                @endif
              </div>
              <!-- Card feed action dropdown END -->
            </div>
          </div>
          <!-- Card header END -->

          <!-- Card body START -->
          <div class="card-body">
            <p>{{ $post->text }}</p>
            <!-- Card img -->
            @if($post->image)
            <img class="card-img" src="{{ url($post->image) }}" alt="Post">
            @endif
            <!-- Feed react START -->
            <ul class="nav nav-stack py-3 small">
              <form action="{{ route('like.post', $post->id) }}"
                method="post">
                @csrf
              <li>
                <button class="{{ $post->liked() ? 'btn btn-primary' : '' }} btn btn-primary ">like {{ $post->likeCount }}</button>
              </li>
              </form>

              <form action="{{ route('unlike.post', $post->id) }}" method="post">
                @csrf
              <li>
                <button class="{{ $post->liked() ? 'btn btn-danger' : 'visually-hidden'}} btn btn-danger"> unlike </button>
              </li>
              </form>

              <li class="nav-item">
                <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments ({{$post->comments->count()}})</a>
              </li>
            </ul>
            <!-- Feed react END -->

            <!-- Add comment -->
            <div class="d-flex mb-3">
              <!-- Avatar -->
              <div class="avatar avatar-xs me-2">
                <a href="#!"> <img class="avatar-img rounded-circle" src="{{ url(Auth::user()->image) }}" alt=""> </a>
              </div>
              <!-- Comment box  -->
              <form class="w-100" method="POST" action="{{ url('/'.$post->id.'/comment') }}">
                @csrf
                <input type="text" name="comment" data-autoresize class="form-control pe-4 bg-light" rows="1" placeholder="Add a comment..."></input>
              </form>
            </div>
            <!-- Comment wrap START -->
            
            <ul class="comment-wrap list-unstyled">
              <!-- Comment item START -->
              @foreach ($post->comments as $comment)  
              <li class="comment-item">
                <div class="d-flex position-relative">
                  <!-- Avatar -->
                  <div class="avatar avatar-xs">
                    <a href="#!"><img class="avatar-img rounded-circle" src="{{ url($comment->user->image ) }}" alt=""></a>
                  </div>
                  <div class="ms-2">
                    <!-- Comment by -->
                    <div class="bg-light rounded-start-top-0 p-3 rounded">
                      <div class="d-flex justify-content-between">
                        <h6 class="mb-1"> <a href="#!"> {{ $comment->user->first_name }} {{ $comment->user->last_name }} </a></h6>
                        <small class="ms-2">{{$comment->created_at->diffForHumans()}}</small>
                      </div>
                      <p class="small mb-0">{{$comment->text}}</p>
                    </div>
                    <!-- Comment react -->
                    <ul class="nav nav-divider py-2 small">
                    </ul>
                  </div>
                </div>
              </li>
              @endforeach
              <!-- Comment item END -->
            </ul>
            <!-- Comment wrap END -->
          </div>
          <!-- Card body END -->
        </div>
        <!-- Card feed item END -->
        

        @endforeach
      </div>
      <!-- Main content END -->

      <!-- Right sidebar START -->
      <div class="col-lg-3">
        <div class="row g-4">
          <!-- Card follow START -->
          <div class="col-sm-6 col-lg-12">
            <div class="card">
              <!-- Card header START -->
              <div class="card-header pb-0 border-0">
                <h5 class="card-title mb-0">Who to follow</h5>
              </div>
              <!-- Card header END -->
              <!-- Card body START -->
              <div class="card-body">
                <!-- Connection item START -->
              @foreach ($users as $user)

                <div class="hstack gap-2 mb-3">
                  <!-- Avatar -->
                  <div class="avatar">
                    <a href="#!"><img class="avatar-img rounded-circle" src="{{$user->image}}" alt=""></a>
                  </div>
                  <!-- Title -->
                  <div class="overflow-hidden">
                    <a class="h6 mb-0" href="#!">{{$user->first_name}} {{$user->last_name}}</a>
                    <p class="mb-0 small text-truncate">{{$user->occupation}}</p>
                  </div>
                </div>
                <!-- Connection item END -->

                <!-- View more button -->
                <div class="d-grid mt-3">
                </div>
            
              @endforeach
            </div>
              <!-- Card body END -->
            </div>
          </div>
          <!-- Card follow START -->


        </div>
      </div>
      <!-- Right sidebar END -->

    </div> <!-- Row END -->
  </div>
  <!-- Container END -->

</main>
@endsection

@section('modals')
@endsection



@section('body-extra')
@endsection
