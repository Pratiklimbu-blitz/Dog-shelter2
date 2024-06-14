<!--== Start: Header Wrapper ==-->
<header class="header-wrapper">
    <!--== Start: Header Top ==-->
    <div class="header-bottom sticky-header">
        <div class="container-fluid header-container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <div class="header-logo">
                        <a href="{{route('front.index')}}">
                            <img class="logo-main" src="{{asset('assets/front/images/logo.png')}}" width="178" height="58" alt="Logo" />
                        </a>
                    </div>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <div class="header-navigation">
                        <ul class="main-nav justify-content-center">

                            <li><a href="/">Home</a></li>

                            <!-- <li class="has-submenu"><a href="causes.html">Causes</a>
        <ul class="submenu-nav">
          <li><a href="causes.html">Causes</a></li>
          <li><a href="causes-details.html">Causes Details</a></li>
        </ul>
      </li> -->
                            <li class="has-submenu"><a href="{{route('dogs.archive')}}">Dogs</a>
                            </li>
                            <li><a href="{{route('front.report')}}">Reports</a>

                            </li>
                            <li><a href="{{route('campaigns.campaign-detail')}}">Campaign</a>

                            </li>
                        </ul>
                    </div>
                </div>
                <style>
                    .mr-2{
                        margin-right: 8px;
                    }
                </style>
                <div class="col-auto d-flex align-items-center gap-6 gap-lg-0">
                    @guest
                        <a class="btn btn-primary header-donate-btn mr-2" href="{{route('register')}}">Register</a>
                        <a class="btn btn-primary header-donate-btn mr-2" href="{{route('login')}}">Login</a>
                    @else

                        <button class="btn btn-primary header-donate-btn mr-2" href="" onclick="logout('#logoutForm');">Logout</button>
{{--                        {{ dd(Auth::user())->role->n }}--}}
                        @if(Auth::user() && Auth::user()->role->id == "1")
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary header-donate-btn mr-2">Dashboard</a>
                        @endif
                        <form action="{{route('logout')}}" id="logoutForm" method="POST">
                            @csrf
                        </form>
                    @endguest
                    <a class="btn btn-primary header-donate-btn" href="{{url('/')."#donation-section"}}">Donate Now</a>
                    <button class="btn-menu d-flex d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--== End: Header Top ==-->
</header>
<!--== End: Header Wrapper ==-->
@push('scripts')
    <script type="text/javascript">
        const logout = (form) =>{
            $(form).submit();
        }
    </script>
@endpush

