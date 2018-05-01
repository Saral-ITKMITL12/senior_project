<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Online Auction For KMITL Community</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">
    <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
      </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link href="{{ asset('css/style.css')}}" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
          <!-- <script src='{{ asset("public/js/app.js") }}'></script> -->

    </head>
<body>

  <div id="app">

        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel ">
          <div class="container col-12 mr-3 ">

                <a class="navbar-brand" href="{{ url('/') }}">
                    Online Auction For KMITL Community
                </a>

                        @guest
                        <ul class="navbar-nav ml-auto">
                            <li><a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">สมัครสมาชิก</a></li>
                        @else



                          <ul class="navbar-nav mr-auto">
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="{{ url('/') }}" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ประมูล</a>
                                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                                      <a class="dropdown-item mb-2" href="{{ route('auction_product') }}">รายการสินค้าประมูล</a>
                                      <a class="dropdown-item mb-2" href="{{ route('auction_product.create') }}">สร้างการประมูล</a>
                                      <a class="dropdown-item mb-2" href="{{ route('auction_product.manage') }}">จัดการการประมูล</a>
                                      <a class="dropdown-item mb-2" href="{{ route('auction_product.history') }}">ประวัติการร่วมประมูล</a>
                                  </div>
                              </li>
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="{{ url('/') }}" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">บริจาค</a>
                                  <div class="dropdown-menu" aria-labelledby="dropdown02">
                                      <a class="dropdown-item mb-2" href="{{ route('donate_item') }}">รายการสิ่งของบริจาค</a>
                                      <a class="dropdown-item mb-2" href="{{ route('donate_item.create') }}">สร้างการบริจาค</a>
                                      <a class="dropdown-item mb-2" href="{{ route('donate_item.manage') }}">จัดการการบริจาค</a>
                                      <a class="dropdown-item mb-2" href="{{ route('donate_item.history') }}">ประวัติการขอรับบริจาค</a>
                                  </div>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ url('/') }}" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">แจ้งปัญหาและร้องเรียน</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown03">
                                  <a class="dropdown-item mb-2" href="{{route('report.create') }}">สร้างการแจ้งปัญหาและร้องเรียน</a>
                                  <a class="dropdown-item mb-2" href="{{route('report') }}">ประวัติการส่งแจ้งปัญหาและร้องเรียน</a>
                                </div>
                              </li>
                          </ul>
                          <ul class="navbar-nav ml-auto pr-5">


                            <li class="nav-item dropdown" id="markasread" onclick="markNotificationAsRead({{count(auth()->user()->unreadNotifications)}})">
                                <a class="nav-link mr-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Notification <span class="badge" id="div2"> </span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li>
                                    <!-- @forelse(auth()->user()->unreadNotifications as $key)

                                      @include('layouts.partials.notification.'.snake_case(class_basename($key->type)))
                                      @empty
                                      <a href="#">No notification</a>
                                    @endforelse -->
                                    <div id="div1"></div>
                                  </li>
                                </ul>
                            </li>
                            </template>

                            <li class="nav-item dropdown">
                                <a class="nav-link mr-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->fname }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                      แก้ไขข้อมูลส่วนตัว
                                  </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ออกจากระบบ
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
<example-component></example-component>
        <main class="py-4">
            @yield('content')
        </main>
      </div>
      <script>
         function getMessage(){
            $.ajax({
               type:'GET',
               url:'/ajax-noti',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data){

               var len = data.length;
                 if(data != '')
                {
                  $("#div1").empty();
                 for (var i = 0; i < len; i++) {
                   console.log(data[i])
                     var result = '<a>'+data[i].id + data[i].name + data[i].action+'</a>'+'<br>' ;
                     $("#div1").append(result);
                 }

               }
               else{
                 $("#div1").html("no notification");
               }
              $("#div2").html(len);
             }
            });
         }
         setInterval(getMessage, 1000);
         // getMessage();

      </script>
    <!-- Scripts -->
<!-- <script src="/js/app.js"></script> -->
    <script src="{{ asset('js\app.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script> -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css')}}">
    <script src="{{ asset('js\moment.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js\th.js') }}" charset="utf-8"></script> -->
    <script src="{{ asset('js\read_noti.js') }}"></script>
    <!-- <script src="{{ asset('js\bootstrap-datetimepicker.min.js') }}" charset="utf-8"></script> -->

</body>
</html>
