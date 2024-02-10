<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | {{ ucfirst(basename(base_path())) }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/logindesign/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontend/logindesign/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontend/logindesign/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontend/logindesign/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>



    <div class="size1 bg0 where1-parent">
        <!-- Coutdown -->
        <div class="flex-c-m bg-img1 size2 where1 overlay1 where2 respon2"
            style="background-image: url('assets/frontend/logindesign/images/master.jpg');"></div>

        <!-- Form -->
        <div class="size3 flex-col-sb flex-w p-l-75 p-r-75 p-t-45 p-b-25 respon1">
            <div class="wrap-pic1">
                {{-- <span class="m1-txt2">DashCE</span> --}}
                <svg width="141" height="29" viewBox="0 0 141 29" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M26.8061 13.7304C26.8061 22.4016 20.4921 28 13.2521 28H10.3055C4.66503 28 2.47618 25.5586 2.47618 20.2969V6.23776H0.118951C0.118951 2.70193 0.118951 0.891913 2.22362 0.891913H13.3783C21.334 0.891913 26.8061 5.14334 26.8061 13.7304ZM12.1576 6.23776H8.66389V19.5813C8.66389 21.686 9.54785 22.6542 11.6525 22.6542H12.5365C16.6616 22.6542 20.1554 19.7497 20.1554 13.7304C20.1554 8.13196 16.4512 6.23776 12.1576 6.23776ZM28.9759 22.2332C28.9759 18.9078 31.1226 16.6348 36.7631 16.1297L41.3934 15.6667V15.5404C41.225 12.2571 38.8257 11.4573 36.0897 11.4573C34.2375 11.4573 32.5117 12.0045 30.9122 12.678V11.0785C30.9122 8.13196 35.5003 7.07963 38.6152 7.07963C42.8667 7.07963 46.9918 8.42661 47.4548 15.372L48.2125 25.7691C48.3809 28.1684 45.9816 28.1684 42.109 28.1684L41.8985 24.9693C40.2569 27.116 37.9418 28.4209 35.0373 28.4209C30.8701 28.4209 28.9759 25.2639 28.9759 22.2332ZM35.4162 21.8965C35.4162 23.2435 36.2159 24.2958 37.6471 24.2958C39.9622 24.2958 41.4355 21.6439 41.5618 19.1183L37.6892 19.5813C36.258 19.7918 35.4162 20.7179 35.4162 21.8965ZM66.2998 21.9386C66.2998 26.4005 62.3009 28.4209 58.1337 28.4209C55.6081 28.4209 51.9881 27.7895 51.9881 24.5063V23.0751C53.3772 23.7065 55.103 24.1274 56.6604 24.1274C58.5546 24.1274 59.9437 23.5802 59.9437 22.4858C59.9437 19.7497 50.6411 21.8965 50.6411 14.1934C50.6411 9.7736 54.5558 7.07963 59.4807 7.07963C64.0689 7.07963 66.9733 9.18429 66.9733 12.0045C66.9733 13.8567 65.6684 14.5722 63.8163 14.5722H62.1747V13.8567C62.1747 12.2992 61.2907 11.3311 59.5228 11.3311C57.8812 11.3311 56.9972 12.3413 56.9972 13.3936C56.9972 17.5609 66.2998 14.6143 66.2998 21.9386ZM90.3473 25.0114C90.3473 28.1684 89.6317 28.1684 84.4121 28.1684V16.5085C84.4121 13.8567 83.3598 12.3834 80.9604 12.3834C78.7295 12.3834 76.3723 14.1092 76.3723 17.3925V28H70.4371V3.88054C70.4371 0.723542 71.1527 0.723542 76.3723 0.723542V11.0785C78.1823 8.38452 80.8342 7.07963 83.7386 7.07963C88.1163 7.07963 90.3473 9.64732 90.3473 14.0671V25.0114Z"
                        fill="#175574" />
                    <path
                        d="M117.211 21.4755V23.2435C117.211 26.7372 112.875 28.4209 107.908 28.4209C99.0688 28.4209 94.0597 22.6962 94.0597 13.6462C94.0597 5.69055 99.4476 0.47098 107.866 0.47098C113.675 0.47098 118.095 3.20704 118.095 7.50056C118.095 9.89988 116.453 11.289 113.886 11.289H112.539V10.3629C112.539 7.50056 110.939 5.64846 107.74 5.64846C103.573 5.64846 100.584 8.88964 100.584 13.6462C100.584 19.3709 103.91 22.9909 109.971 22.9909C112.581 22.9909 114.938 22.4016 117.211 21.4755ZM140.388 22.8646V28H129.485C123.761 28 121.867 26.1058 121.867 20.5495V4.091C121.867 0.891913 122.793 0.891913 128.181 0.891913H138.115C140.135 0.891913 140.135 2.61774 140.135 6.0273H128.181V12.5939H137.652V17.1399H128.181V20.0444C128.181 22.0228 129.022 22.8646 131.085 22.8646H140.388Z"
                        fill="#A1C353" />
                </svg>

            </div>

            <div class="p-t-30 p-b-60">
                <p class="m1-txt1 p-b-36">
                    <span class="m1-txt2">Welcome to DashCE</span>
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form class="contact100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="wrap-input100 m-b-20 validate-input" data-validate ="Email is required: ex@abc.xyz">
                        <input class="s2-txt1 placeholder0 input100" type="email" name="email" id="email"
                            placeholder="Email Address">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 m-b-10 validate-input" data-validate = "Password is required">
                        <input class="s2-txt1 placeholder0 input100" type="password" name="password" id="password"
                            placeholder="Password">
                        <i class="fa fa-eye" id="togglePassword"
                            style="float: right;right: 15px;bottom: 30px;position: relative;z-index: 2;"></i>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="w-full">
                        <button type="submit" class="flex-c-m s2-txt2 size4 bg1 bor1 hov1 trans-04">
                            Login
                        </button>
                    </div>
                </form>

                <p class="s2-txt3 p-t-18"></p>
                <div class="w-full">
                    <a class="flex-c-m s2-txt2 size4 bg1 bor1 hov1 trans-04"
                        href="{{ route('register') }}">Register</a>
                </div>
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
    <script src="{{ asset('assets/frontend/logindesign/vendor/countdowntime/moment-timezone-with-data.min.js') }}">
    </script>
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
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
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
