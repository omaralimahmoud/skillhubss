<!-- Navigation -->
<nav id="nav">
    <form  id="logout-form" action="{{ url('logout') }}" method="POST">
     @csrf
    </form>
    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="{{ url('/') }}">@lang('web.home')</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('web.CATS') <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach ($cats as $cat )
                <li><a href="{{ url("/categories/show/{$cat->id}") }}">{{ $cat->name() }}</a></li>
                @endforeach

            </ul>
        </li>
        <li><a href="{{ url('/contact') }}">@lang('web.Contact')</a></li>
         @guest
         <li><a href="{{ url('login') }}">@lang('web.Sign In')</a></li>
         <li><a href="{{ url('register') }}">@lang('web.Sign Up')</a></li>

         @endguest

         @auth
         <li><a id="logout-link"   href="#">@lang('web.Signout')</a></li>
         @if (Auth::user()->role->name == 'student')
         <li><a   href="{{url('profile')}}">@lang('web.profile')</a></li>
         @else
         <li><a   href="{{url('dashboard')}}">@lang('web.dashboard')</a></li>
         @endif
         @endauth


        @if (App::getLocale()=='ar')
        <li><a href="{{ url('/lang/set/en') }}">En</a></li>
        @else
        <li><a href="{{ url('/lang/set/ar') }}">ع</a></li>

        @endif



    </ul>
</nav>
<!-- /Navigation -->


