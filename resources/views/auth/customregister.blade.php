<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register | DashCE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/logindesign/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
    
    
    
    <div class="size1 bg0 where1-parent">
        <!-- Coutdown -->
        <div class="flex-c-m bg-img1 size2 where1 overlay1 where2 respon2" style="background-image: url('assets/frontend/logindesign/images/master.jpg');"></div>
        
        <!-- Form -->
        <div class="size3 flex-col-sb flex-w p-l-75 p-r-75 p-t-45 p-b-45 respon1">
            <div class="wrap-pic1">
                <span class="m1-txt2">DashCE</span>
                <!-- <img src="images/icons/logo.png" alt="LOGO"> -->
            </div>

            <div class="p-t-50 p-b-60">
                <p class="m1-txt1 p-b-36">
                    <span class="m1-txt2">Register to DashCE</span>
                </p>

                     @if($errors->any())
                        <div class="alert alert-danger">
                         @foreach ($errors->all() as $error)
                             <div>{{$error}}</div>
                         @endforeach
                        </div>
                     @endif

                <form class="contact100-form validate-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                   @csrf

                   <div class="wrap-input100 m-b-20 validate-input" data-validate ="Name is required">
                        <input class="s2-txt1 placeholder0 input100" type="text" name="name" id="name" placeholder="Name">
                        <span class="focus-input100"></span>
                    </div>
                        <!-- <input class="s2-txt1 placeholder0 input100" type="hidden" name="verified_by" id="verified_by" placeholder="Verified By"> -->

                    <div class="wrap-input100 m-b-20 validate-input" data-validate ="Email is required: ex@abc.xyz">
                        <input class="s2-txt1 placeholder0 input100" type="email" name="email" id="email" placeholder="Email Address">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 m-b-20 validate-input" data-validate ="Phone is required">
                        <input class="s2-txt1 placeholder0 input100" type="number" name="phone" id="phone" placeholder="Phone">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 m-b-20">
                        <input class="s2-txt1 placeholder0 input100" type="text" name="referring_url" id="referring_url" placeholder="Referring Url">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 m-b-10 validate-input" data-validate = "Password is required">
                        <input class="s2-txt1 placeholder0 input100" type="password" name="password" id="password" placeholder="Password">
                        <i class="fa fa-eye" id="togglePassword" style="float: right;right: 15px;bottom: 30px;position: relative;z-index: 2;"></i>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 m-b-10 validate-input" data-validate = "Confirm Password is required">
                        <input class="s2-txt1 placeholder0 input100" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                        <!-- <i class="fa fa-eye" id="togglePassword" style="float: right;right: 15px;bottom: 30px;position: relative;z-index: 2;"></i> -->
                        <span class="focus-input100"></span>
                    </div>

                    <div class="w-full">
                        <button type="submit" class="flex-c-m s2-txt2 size4 bg1 bor1 hov1 trans-04">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>

                <br>

                <div class="w-full">
                    <a class="flex-c-m s2-txt2 size4 bg1 bor1 hov1 trans-04" href="{{ route('login') }}">Login</a>
                </div>

                <p class="s2-txt3 p-t-18"></p>
            </div>

            <div class="flex-w">
                <a href="javascript:void(0);" class="flex-c-m size5 bg3 how1 trans-04 m-r-5">
                    <i class="fa fa-facebook"></i>
                </a>

                <a href="javascript:void(0);" class="flex-c-m size5 bg4 how1 trans-04 m-r-5">
                    <i class="fa fa-twitter"></i>
                </a>

                <a href="javascript:void(0);" class="flex-c-m size5 bg5 how1 trans-04 m-r-5">
                    <i class="fa fa-youtube-play"></i>
                </a>
            </div>
        </div>
    </div>



    

<!--===============================================================================================-->  
    <script src="{{ asset('assets/frontend/logindesign/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('assets/frontend/logindesign/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/frontend/logindesign/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('assets/frontend/logindesign/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('assets/frontend/logindesign/vendor/countdowntime/moment.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/logindesign/vendor/countdowntime/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/logindesign/vendor/countdowntime/moment-timezone-with-data.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/logindesign/vendor/countdowntime/countdowntime.js') }}"></script>
    <script>
        $('.cd100').countdown100({
            /*Set Endtime here*/
            /*Endtime must be > current time*/
            endtimeYear: 0,
            endtimeMonth: 0,
            endtimeDate: 35,
            endtimeHours: 18,
            endtimeMinutes: 0,
            endtimeSeconds: 0,
            timeZone: "" 
            // ex:  timeZone: "America/New_York"
            //go to " http://momentjs.com/timezone/ " to get timezone
        });
    </script>
<!--===============================================================================================-->
    <script src="{{ asset('assets/frontend/logindesign/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
            togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
<!--===============================================================================================-->
    <script src="{{ asset('assets/frontend/logindesign/js/main.js') }}"></script>

</body>
</html>
