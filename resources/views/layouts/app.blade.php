<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">


        <link href="{{ asset('css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('css/button.css')}}" rel="stylesheet">

    </head>
<body>

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel ">
          <div class="container col-12 mr-3 ">

                <a class="navbar-brand" href="{{ url('/') }}">
                    Online Auction For KMITL Community
                </a>

                        @guest
                        <ul class="navbar-nav ml-auto">
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else



                          <ul class="navbar-nav mr-auto">
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="{{ url('/') }}" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Auction</a>
                                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                                      <a class="dropdown-item mb-2" href="{{ route('auction_product') }}">Auction List</a>
                                      <a class="dropdown-item mb-2" href="{{ route('auction_product.create') }}">Create Auction</a>
                                      <a class="dropdown-item mb-2" href="{{ route('auction_product.manage') }}">Manage Auction</a>
                                      <a class="dropdown-item mb-2" href="auction_history.html">Auction History</a>
                                  </div>
                              </li>
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="{{ url('/') }}" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Donation</a>
                                  <div class="dropdown-menu" aria-labelledby="dropdown02">
                                      <a class="dropdown-item mb-2" href="{{ route('donate_item') }}">Donation List</a>
                                      <a class="dropdown-item mb-2" href="{{ route('donate_item.create') }}">Create Donation</a>
                                      <a class="dropdown-item mb-2" href="{{ route('donate_item.manage') }}">Manage Donation</a>
                                      <a class="dropdown-item mb-2" href="donation_history.html">Donation History</a>
                                  </div>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ url('/') }}" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown03">
                                  <a class="dropdown-item mb-2" href="{{route('report.create') }}">Send Report</a>
                                  <a class="dropdown-item mb-2" href="{{route('report') }}">Report History</a>
                                </div>
                              </li>
                          </ul>
                          <ul class="navbar-nav ml-auto pr-5">


                            <li class="nav-item dropdown">
                                <a class="nav-link mr-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->fname }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                      Edit Profile
                                  </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                            <img class="img ml-3 mr-3" src="{{ asset(Auth::user()->image_profile)}}" style="width: 48px;height: 48px;">
                            </ul>
                        @endguest
                    </ul>
                </div>

        </nav>
</div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>

</body>
</html>
