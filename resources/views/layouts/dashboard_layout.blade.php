<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Elycha | Tableau de bord</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href={{asset('/front/app/dist/font-awesome.css')}}>

    <link rel="stylesheet" href={{asset('/front/app/dist/app.css')}}>
    <link rel="stylesheet" href={{asset('/front/app/dist/responsive.css')}}>
    <link rel="stylesheet" href={{asset('/front/app/dist/owl.css')}}>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href={{asset('/front/assets/images/logo/Favicon.png')}}>
    <link rel="apple-touch-icon-precomposed" href={{asset('/front/assets/images/logo/Favicon.png')}}>


    <style>
        .primary-background {
            background-color: #EC8325;
            color: white;
        }
    </style>

</head>

<body class="body counter-scroll dashboard show ">
    @if (Session::has('flash_message_error'))
        <script type="text/javascript" src="{{ asset('sweetalert.min.js') }}"></script>
        <script type="text/javascript">
            swal("{{ session('flash_message_error') }}", "Merci", "error");
        </script>
    @endif
    @if (Session::has('flash_message_success'))
        <script type="text/javascript" src="{{ asset('sweetalert.min.js') }}"></script>
        <script type="text/javascript">
            swal("{{ session('flash_message_success') }}", "Merci", "success");
        </script>
    @endif

    <div class="preload preload-container">
        <div class="boxes ">
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <!-- /preload -->

    <div id="wrapper">
        <div id="pagee" class="clearfix">

            <!-- Main Header -->
            <header class="main-header ">

                <!-- Header Lower -->
                <div class="header-lower">
                    <div class="container6">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="inner-container d-flex justify-content-between align-items-center">

                                    <div class="nav-outer flex align-center">
                                        <!-- Main Menu -->
                                        <nav class="main-menu show navbar-expand-md">
                                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                                <ul class="navigation clearfix">
                                                    <li><a href="/">Retourner sur le site</a></li>
                                                </ul>
                                            </div>
                                        </nav>
                                        <!-- Main Menu End-->
                                    </div>
                                    <div class="header-account flex align-center">
                                        <div class="avatars-box flex align-center">
                                            <div class="images flex-none">
                                                <img src="{{ getUserLogged()->avatar }}" alt="">
                                            </div>
                                            <div class="title-avatar fw-6"><a
                                                    href="#">{{ getUserLogged()->first_name . ' ' . getUserLogged()->last_name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Header Lower -->
            </header>

            <div class="btn2 header-item " id="left-menu-btn">
                <span class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>

            <!-- ========== Left Sidebar ========== -->
            <div class="left-menu">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Logo Box -->
                    <div class="logo-box d-flex">
                        <div class="logo text-center">
                            <a href="@if (getUserLogged()->type_user == 1) /client/dashboard @else /agent/dashboard @endif">
                                <img src="/front/assets/images/logo/logo.png" alt="" style="width:60%"
                                    class="img-logo">
                                <img src="/front/assets/images/logo/toggle-logo%402x.png" alt="" width="46"
                                    height="48" class="toggle-logo">
                            </a>
                        </div>
                    </div>
                    <div class="profile-box">
                        <div class="title-1 fw-6">
                            @if (getUserLogged()->type_user == 1)
                                Client
                            @else
                                Agent
                            @endif
                        </div>
                        <div class="avatar-box flex align-center">
                            <div class="avatar flex-none">
                                <img src="{{ getUserLogged()->avatar }}" class="rounded-circle" alt=""
                                    title="">
                            </div>
                            <div class="content">
                                <div class="sub-title fs-12 lh-18">
                                    {{ getUserLogged()->first_name . ' ' . getUserLogged()->last_name }}</div>
                                <div class="titles fw-6"><a href="#">{{ getUserLogged()->telephone }}</a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="title-2 fw-6">Menu</div>
                    <ul class="downmenu list-unstyled" id="side-menu">
                        <li>
                            <a href="@if (getUserLogged()->type_user == 1) /client/dashboard @else /agent/dashboard @endif"
                                class="tf-effect">
                                <span class="icon-dash dash-icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M6.75682 9.35156V15.64" stroke="white" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.0342 6.34253V15.64" stroke="white" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M15.2412 12.6746V15.64" stroke="white" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.2939 1.83331H6.70346C3.70902 1.83331 1.83203 3.95272 1.83203 6.95304V15.0469C1.83203 18.0472 3.70029 20.1666 6.70346 20.1666H15.2939C18.2971 20.1666 20.1654 18.0472 20.1654 15.0469V6.95304C20.1654 3.95272 18.2971 1.83331 15.2939 1.83331Z"
                                                stroke="#F1FAEE" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="dash-titles">Tableau de bord</span>
                            </a>
                        </li>
                        <li>
                            <a href="/user/profile" class="has-arrow tf-effect">
                                <span class="icon-dash dash-icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.987 14.0674C7.44168 14.0674 4.41406 14.6034 4.41406 16.7502C4.41406 18.8969 7.42247 19.4521 10.987 19.4521C14.5323 19.4521 17.5591 18.9152 17.5591 16.7694C17.5591 14.6235 14.5515 14.0674 10.987 14.0674Z"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.9866 11.0054C13.3132 11.0054 15.1989 9.11885 15.1989 6.79226C15.1989 4.46567 13.3132 2.57996 10.9866 2.57996C8.66005 2.57996 6.77346 4.46567 6.77346 6.79226C6.7656 9.11099 8.6391 10.9976 10.957 11.0054H10.9866Z"
                                            stroke="white" stroke-width="1.42857" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span class="dash-titles">Mon compte</span>
                            </a>
                        </li>
                        @if (getUserLogged()->type_user == 1)
                            <li>
                                <a href="#" class="tf-effect">
                                    <span class="icon-save-candidate dash-icon">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2.63385 10.6318C1.65026 7.56096 2.79976 4.05104 6.02368 3.01246C7.71951 2.46521 9.59135 2.78788 11.0012 3.84846C12.3349 2.81721 14.2755 2.46888 15.9695 3.01246C19.1934 4.05104 20.3503 7.56096 19.3676 10.6318C17.8368 15.4993 11.0012 19.2485 11.0012 19.2485C11.0012 19.2485 4.21601 15.5561 2.63385 10.6318Z"
                                                stroke="#F1FAEE" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M14.668 6.14166C15.6488 6.45883 16.3418 7.33425 16.4252 8.36183"
                                                stroke="#F1FAEE" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="dash-titles">Mes favoris</span>
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="/agent/posts" class="tf-effect">
                                    <span class="icon-applicant dash-icon">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.533 2.55658H7.10561C4.28686 2.55658 2.51953 4.55216 2.51953 7.37733V14.9985C2.51953 17.8237 4.27861 19.8192 7.10561 19.8192H15.1943C18.0222 19.8192 19.7813 17.8237 19.7813 14.9985V11.3062"
                                                stroke="#F1FAEE" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.09012 10.0108L14.9404 3.16055C15.7938 2.30805 17.177 2.30805 18.0305 3.16055L19.146 4.27614C19.9995 5.12955 19.9995 6.51372 19.146 7.36622L12.2628 14.2495C11.8897 14.6226 11.3837 14.8325 10.8557 14.8325H7.42188L7.50804 11.3675C7.52087 10.8578 7.72896 10.372 8.09012 10.0108Z"
                                                stroke="#F1FAEE" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M13.8984 4.21893L18.0839 8.40443" stroke="#F1FAEE"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="dash-titles">Mes publications</span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="/user/update-password" class="tf-effect">
                                <span class="icon-change-passwords dash-icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M19.0713 6.98821L18.5008 5.99813C18.0181 5.16037 16.9484 4.87136 16.1095 5.35206V5.35206C15.7101 5.5873 15.2336 5.65404 14.785 5.53756C14.3364 5.42108 13.9526 5.13096 13.7182 4.73116C13.5673 4.47703 13.4863 4.18759 13.4832 3.8921V3.8921C13.4968 3.41835 13.3181 2.95927 12.9877 2.61943C12.6574 2.27959 12.2035 2.08794 11.7296 2.08813H10.5801C10.1158 2.08813 9.67059 2.27315 9.34306 2.60226C9.01552 2.93138 8.83263 3.37744 8.83486 3.84176V3.84176C8.8211 4.80041 8.03999 5.57031 7.08124 5.57021C6.78575 5.56714 6.49631 5.4861 6.24219 5.33527V5.33527C5.40328 4.85458 4.33358 5.14359 3.85088 5.98135L3.23837 6.98821C2.75626 7.82493 3.04134 8.89395 3.87605 9.37952V9.37952C4.41863 9.69277 4.75288 10.2717 4.75288 10.8982C4.75288 11.5247 4.41863 12.1036 3.87605 12.4169V12.4169C3.0424 12.8992 2.75701 13.9656 3.23837 14.7998V14.7998L3.81732 15.7983C4.04348 16.2064 4.42294 16.5075 4.87173 16.6351C5.32052 16.7626 5.80164 16.7061 6.20862 16.4779V16.4779C6.60871 16.2445 7.08548 16.1805 7.53295 16.3002C7.98042 16.42 8.36152 16.7135 8.59154 17.1156C8.74236 17.3697 8.8234 17.6592 8.82647 17.9546V17.9546C8.82647 18.9231 9.6116 19.7083 10.5801 19.7083H11.7296C12.6948 19.7083 13.4786 18.9283 13.4832 17.963V17.963C13.481 17.4973 13.665 17.0499 13.9944 16.7206C14.3237 16.3912 14.7711 16.2072 15.2368 16.2094C15.5316 16.2173 15.8199 16.298 16.0759 16.4444V16.4444C16.9126 16.9265 17.9816 16.6414 18.4672 15.8067V15.8067L19.0713 14.7998C19.3052 14.3984 19.3693 13.9204 19.2497 13.4716C19.13 13.0227 18.8363 12.6401 18.4336 12.4085V12.4085C18.031 12.1769 17.7373 11.7943 17.6176 11.3454C17.4979 10.8966 17.5621 10.4186 17.796 10.0172C17.948 9.75171 18.1682 9.53158 18.4336 9.37952V9.37952C19.2634 8.89422 19.5478 7.83143 19.0713 6.9966V6.9966V6.98821Z"
                                            stroke="#F1FAEE" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <ellipse cx="11.1587" cy="10.8982" rx="2.41648" ry="2.41648"
                                            stroke="#F1FAEE" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span class="dash-titles">Changer de mot de passe</span>
                            </a>
                        </li>
                        <li>
                            <a href="/auth/logout" class="tf-effect">
                                <span class="icon-log-out dash-icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.7627 6.77369V5.91844C13.7627 4.05303 12.2502 2.54053 10.3848 2.54053H5.91606C4.05156 2.54053 2.53906 4.05303 2.53906 5.91844V16.1209C2.53906 17.9864 4.05156 19.4989 5.91606 19.4989H10.394C12.2539 19.4989 13.7627 17.9909 13.7627 16.131V15.2666"
                                            stroke="#F1FAEE" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M19.9907 11.0196H8.95312" stroke="#F1FAEE" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M17.3047 8.34741L19.9887 11.0195L17.3047 13.6925" stroke="#F1FAEE"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span class="dash-titles">Déconnexion</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- left sidebar end -->
            <div class="dashboard__content">
                @yield('content')
            </div>

            <!-- Bottom -->
        </div>
        <!-- /#page -->

    </div>

    <a id="scroll-top" class="button-go"></a>

    <!-- Javascript -->
    <script data-cfasync="false" src="https://themesflat.co/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src={{asset('/front/app/js/apexcharts.js')}}></script>
    <script src={{asset('/front/app/js/jquery.min.js')}}></script>
    <script src={{asset('/front/app/js/jquery.easing.js')}}></script>
    <script src={{asset('/front/app/js/jquery.nice-select.min.js')}}></script>
    <script src={{asset('/front/app/js/jquery.cookie.js')}}></script>
    <script src={{asset('/front/app/js/bootstrap.min.js')}}></script>
    <script src={{asset('/front/app/js/swiper-bundle.min.js')}}></script>
    <script src={{asset('/front/app/js/countto.js')}}></script>

    <script src={{asset('/front/app/js/plugin.js')}}></script>
    <script src={{asset('/front/app/js/shortcodes.js')}}></script>
    <script src={{asset('/front/app/js/main.js')}}></script>
    <script src={{asset('/front/app/js/dashboard-menu.min.js')}}></script>
    <script src={{asset('/front/app/js/dashboard-menu.js')}}></script>

    @yield('scripts')
</body>

</html>
