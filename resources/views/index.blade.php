@extends('layouts.home_layout')
@section('content')
    <div id="wrapper">
        <div id="pagee" class="clearfix">
            <div class="wrap-top">
                <div class="container2">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="inner-container d-flex justify-content-between align-items-center">
                                <div class="register">
                                    <div class="logo"><a href="/"><img src="/front/assets/images/logo/logo2-1.png"
                                                alt="" style="width:80px"></a></div>
                                </div>
                                <div class="icon-tell-box flex align-center">
                                     <div class="icon flex-none">

                                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.9">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.26135 17.3176L10.3744 14.2041C10.8085 13.7699 11.3522 13.5664 11.9646 13.6085C12.577 13.6507 13.0877 13.9271 13.4581 14.4166L18.0679 20.5097C18.6893 21.331 18.611 22.4676 17.8827 23.1959L15.7252 25.3537C19.0452 28.1764 21.8211 30.9536 24.6433 34.2735L26.8013 32.1152C27.5296 31.3868 28.666 31.3086 29.4872 31.9301L35.5794 36.5405C36.0689 36.9109 36.3452 37.4216 36.3874 38.0341C36.4296 38.6466 36.226 39.1904 35.7919 39.6245L32.6783 42.7385C25.5089 49.909 0.0917082 24.4882 7.26135 17.3176ZM33.8537 6C39.4572 6 43.9997 10.2467 43.9997 15.4854C43.9997 20.724 39.4572 24.9707 33.8537 24.9707C31.9295 24.9707 30.1305 24.4699 28.5975 23.6002C27.3492 24.1528 26.0098 24.3125 24.728 24.123C25.208 23.2144 25.5656 22.2462 25.7915 21.2437C24.4847 19.647 23.7077 17.6511 23.7077 15.4854C23.7077 10.2467 28.2502 6 33.8537 6Z"
                                                    stroke="#EC8325" stroke-miterlimit="22.9256" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M33.8308 20.0552V14.4344H32.5506M32.4907 20.1123H35.171M33.8308 10.7305V10.7595"
                                                    stroke="#EC8325" stroke-miterlimit="22.9256" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <p class="text-color-2">Appelez-nous:</p>
                                        <a href="tel:22890030002">
                                            <h5 class="fw-6 text-color-3">(228) 90030002</h5>
                                        </a>
                                    </div>

                                </div>
                                <!-- Logo Box -->


                                <div class="header-account flex align-center">
                                    @if (!auth()->check())
                                        <div class="register">
                                            <ul class="flex align-center">
                                                <li>
                                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.62501 18.5744H2.70418C2.65555 18.5744 2.60892 18.5551 2.57454 18.5207C2.54016 18.4863 2.52084 18.4397 2.52084 18.3911V17.0619C2.52084 16.3002 3.06443 15.6292 3.90226 15.059C5.39826 14.0378 7.81918 13.3943 10.5417 13.3943C10.9908 13.3943 11.4318 13.4127 11.8626 13.4466C11.9537 13.4558 12.0457 13.4466 12.1332 13.4198C12.2207 13.3929 12.3019 13.3489 12.3722 13.2902C12.4424 13.2315 12.5003 13.1594 12.5423 13.0781C12.5843 12.9968 12.6097 12.9079 12.6169 12.8166C12.6241 12.7254 12.613 12.6336 12.5842 12.5467C12.5555 12.4598 12.5097 12.3795 12.4495 12.3105C12.3893 12.2416 12.316 12.1853 12.2338 12.1451C12.1516 12.1048 12.0621 12.0814 11.9708 12.0762C11.4954 12.038 11.0186 12.0191 10.5417 12.0193C7.49651 12.0193 4.80059 12.7811 3.12676 13.9223C1.84984 14.7932 1.14584 15.8996 1.14584 17.061V18.3911C1.14609 18.8042 1.31037 19.2003 1.60259 19.4924C1.89481 19.7844 2.29104 19.9485 2.70418 19.9485L9.62501 19.9494C9.80735 19.9494 9.98221 19.877 10.1111 19.748C10.2401 19.6191 10.3125 19.4443 10.3125 19.2619C10.3125 19.0796 10.2401 18.9047 10.1111 18.7758C9.98221 18.6468 9.80735 18.5744 9.62501 18.5744ZM10.5417 1.14583C7.75868 1.14583 5.50001 3.4045 5.50001 6.1875C5.50001 8.9705 7.75868 11.2292 10.5417 11.2292C13.3247 11.2292 15.5833 8.9705 15.5833 6.1875C15.5833 3.4045 13.3247 1.14583 10.5417 1.14583ZM10.5417 2.52083C12.5657 2.52083 14.2083 4.1635 14.2083 6.1875C14.2083 8.2115 12.5657 9.85416 10.5417 9.85416C8.51768 9.85416 6.87501 8.2115 6.87501 6.1875C6.87501 4.1635 8.51768 2.52083 10.5417 2.52083Z"
                                                            fill="#1C1C1E" />
                                                        <path
                                                            d="M16.6393 18.524C17.2592 18.618 17.8928 18.5515 18.4796 18.3311C19.0665 18.1106 19.5871 17.7434 19.9918 17.2646C20.3965 16.7858 20.6717 16.2112 20.7913 15.5958C20.9109 14.9804 20.8707 14.3446 20.6748 13.7491C20.4788 13.1536 20.1335 12.6182 19.6719 12.194C19.2102 11.7698 18.6476 11.471 18.0377 11.326C17.4277 11.1811 16.7908 11.1948 16.1877 11.3659C15.5846 11.537 15.0353 11.8598 14.5924 12.3035C14.186 12.7095 13.8807 13.2053 13.7013 13.751C13.5218 14.2967 13.4732 14.877 13.5593 15.4449L11.4308 17.5725C11.3669 17.6364 11.3161 17.7123 11.2815 17.7958C11.2469 17.8793 11.2291 17.9688 11.2292 18.0593V20.1667C11.2292 20.5462 11.5372 20.8542 11.9167 20.8542H14.0241C14.1145 20.8542 14.204 20.8364 14.2875 20.8018C14.3711 20.7672 14.4469 20.7165 14.5108 20.6525L16.6393 18.524ZM16.5917 17.1123C16.4753 17.0813 16.3528 17.0814 16.2365 17.1127C16.1202 17.1439 16.0141 17.2051 15.9289 17.2902L13.7399 19.4792H12.6042V18.3434L14.7932 16.1544C14.8782 16.0692 14.9395 15.9631 14.9707 15.8468C15.0019 15.7305 15.002 15.608 14.971 15.4917C14.8415 15.0042 14.8762 14.4878 15.0697 14.022C15.2632 13.5563 15.6046 13.1672 16.0413 12.915C16.478 12.6627 16.9857 12.5613 17.4858 12.6264C17.9859 12.6915 18.4506 12.9195 18.8082 13.2752C19.1638 13.6327 19.3918 14.0975 19.4569 14.5976C19.522 15.0977 19.4206 15.6053 19.1684 16.042C18.9161 16.4787 18.5271 16.8202 18.0613 17.0136C17.5956 17.2071 17.0791 17.2418 16.5917 17.1123Z"
                                                            fill="#EC8325" />
                                                        <path
                                                            d="M16.4835 15.5998C16.3877 15.5083 16.3111 15.3984 16.2583 15.2768C16.2055 15.1552 16.1775 15.0243 16.1761 14.8917C16.1746 14.7592 16.1996 14.6276 16.2497 14.5049C16.2998 14.3822 16.374 14.2707 16.4678 14.177C16.5616 14.0833 16.6732 14.0093 16.796 13.9594C16.9188 13.9095 17.0503 13.8846 17.1829 13.8862C17.3154 13.8879 17.4463 13.916 17.5679 13.9689C17.6894 14.0219 17.7991 14.0986 17.8906 14.1946C18.0698 14.3826 18.1683 14.6333 18.1651 14.893C18.1619 15.1527 18.0572 15.4009 17.8734 15.5845C17.6896 15.768 17.4413 15.8724 17.1816 15.8752C16.9219 15.8781 16.6713 15.7793 16.4835 15.5998Z"
                                                            fill="#EC8325" />
                                                    </svg>
                                                </li>
                                                <li class=""><a href="#" data-toggle="modal"
                                                        data-target="#popup_bid2">Inscription</a></li>
                                                <li><span>/</span></li>
                                                <li class=""><a href="#" data-toggle="modal"
                                                        data-target="#popup_bid"> Connexion</a></li>
                                            </ul>
                                        </div>
                                    @endif
                                    @if (auth()->check())
                                        <div class="flat-bt-top sc-btn-top">
                                            <a class="sc-button btn-icon "
                                                href="@if (auth()->user()->type_user == 1) /client/dashboard
                                                @elseif (auth()->user()->type_user == 2) /agent/dashboard
                                                @elseif (auth()->user()->type_user == 3) /architecte/dashboard
                                                @elseif (auth()->user()->type_user == 4) /societe/dashboard
                                                @elseif (auth()->user()->type_user == 5) /organe/dashboard
                                                @else # @endif">
                                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.25 15.75V15H11.375C10.7547 15 10.25 14.4953 10.25 13.875V12.375C10.25 11.7547 10.7547 11.25 11.375 11.25H11.75V10.5H13.25V11.25H14C14.1989 11.25 14.3897 11.329 14.5303 11.4697C14.671 11.6103 14.75 11.8011 14.75 12C14.75 12.1989 14.671 12.3897 14.5303 12.5303C14.3897 12.671 14.1989 12.75 14 12.75H11.75V13.5H13.625C14.2453 13.5 14.75 14.0047 14.75 14.625V16.125C14.75 16.7453 14.2453 17.25 13.625 17.25H13.25V18H11.75V17.25H11C10.8011 17.25 10.6103 17.171 10.4697 17.0303C10.329 16.8897 10.25 16.6989 10.25 16.5C10.25 16.3011 10.329 16.1103 10.4697 15.9697C10.6103 15.829 10.8011 15.75 11 15.75H13.25Z"
                                                        fill="white" />
                                                    <path
                                                        d="M22.469 10.6447L14.315 2.96925C13.8234 2.50736 13.1742 2.25024 12.4996 2.25024C11.825 2.25024 11.1759 2.50736 10.6842 2.96925L8.74998 4.791V3C8.74998 2.80109 8.67096 2.61032 8.53031 2.46967C8.38966 2.32902 8.19889 2.25 7.99998 2.25H4.99998C4.80107 2.25 4.6103 2.32902 4.46965 2.46967C4.329 2.61032 4.24998 2.80109 4.24998 3V9.027L2.55273 10.6252C2.03748 11.0722 1.86348 11.784 2.10798 12.4387C2.34873 13.0837 2.93823 13.5 3.60948 13.5H4.24998V21C4.24998 21.1989 4.329 21.3897 4.46965 21.5303C4.6103 21.671 4.80107 21.75 4.99998 21.75H20C20.1989 21.75 20.3897 21.671 20.5303 21.5303C20.671 21.3897 20.75 21.1989 20.75 21V13.5H21.389C22.061 13.5 22.6512 13.083 22.892 12.438C23.1357 11.7832 22.961 11.0715 22.469 10.6447ZM5.74998 3.75H7.24998V6.2025L5.74998 7.61475V3.75ZM21.4865 11.9138C21.4542 12 21.4047 12 21.389 12H20C19.8011 12 19.6103 12.079 19.4697 12.2197C19.329 12.3603 19.25 12.5511 19.25 12.75V20.25H5.74998V12.75C5.74998 12.5511 5.67096 12.3603 5.53031 12.2197C5.38966 12.079 5.19889 12 4.99998 12H3.60948C3.59373 12 3.54498 12 3.51273 11.9138C3.50022 11.8834 3.49792 11.8498 3.50617 11.818C3.51442 11.7862 3.53278 11.7579 3.55848 11.7375L11.7125 4.062C11.9257 3.86178 12.2071 3.75032 12.4996 3.75032C12.7921 3.75032 13.0735 3.86178 13.2867 4.062L21.4625 11.7578C21.5187 11.8058 21.4977 11.883 21.4865 11.9138Z"
                                                        fill="white" />
                                                </svg>
                                                <span>Tableau de bord</span>
                                            </a>
                                        </div>
                                    {{-- @else
                                        <div class="flat-bt-top sc-btn-top">
                                            <a class="sc-button btn-icon " href="/posts/all">
                                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.25 15.75V15H11.375C10.7547 15 10.25 14.4953 10.25 13.875V12.375C10.25 11.7547 10.7547 11.25 11.375 11.25H11.75V10.5H13.25V11.25H14C14.1989 11.25 14.3897 11.329 14.5303 11.4697C14.671 11.6103 14.75 11.8011 14.75 12C14.75 12.1989 14.671 12.3897 14.5303 12.5303C14.3897 12.671 14.1989 12.75 14 12.75H11.75V13.5H13.625C14.2453 13.5 14.75 14.0047 14.75 14.625V16.125C14.75 16.7453 14.2453 17.25 13.625 17.25H13.25V18H11.75V17.25H11C10.8011 17.25 10.6103 17.171 10.4697 17.0303C10.329 16.8897 10.25 16.6989 10.25 16.5C10.25 16.3011 10.329 16.1103 10.4697 15.9697C10.6103 15.829 10.8011 15.75 11 15.75H13.25Z"
                                                        fill="white" />
                                                    <path
                                                        d="M22.469 10.6447L14.315 2.96925C13.8234 2.50736 13.1742 2.25024 12.4996 2.25024C11.825 2.25024 11.1759 2.50736 10.6842 2.96925L8.74998 4.791V3C8.74998 2.80109 8.67096 2.61032 8.53031 2.46967C8.38966 2.32902 8.19889 2.25 7.99998 2.25H4.99998C4.80107 2.25 4.6103 2.32902 4.46965 2.46967C4.329 2.61032 4.24998 2.80109 4.24998 3V9.027L2.55273 10.6252C2.03748 11.0722 1.86348 11.784 2.10798 12.4387C2.34873 13.0837 2.93823 13.5 3.60948 13.5H4.24998V21C4.24998 21.1989 4.329 21.3897 4.46965 21.5303C4.6103 21.671 4.80107 21.75 4.99998 21.75H20C20.1989 21.75 20.3897 21.671 20.5303 21.5303C20.671 21.3897 20.75 21.1989 20.75 21V13.5H21.389C22.061 13.5 22.6512 13.083 22.892 12.438C23.1357 11.7832 22.961 11.0715 22.469 10.6447ZM5.74998 3.75H7.24998V6.2025L5.74998 7.61475V3.75ZM21.4865 11.9138C21.4542 12 21.4047 12 21.389 12H20C19.8011 12 19.6103 12.079 19.4697 12.2197C19.329 12.3603 19.25 12.5511 19.25 12.75V20.25H5.74998V12.75C5.74998 12.5511 5.67096 12.3603 5.53031 12.2197C5.38966 12.079 5.19889 12 4.99998 12H3.60948C3.59373 12 3.54498 12 3.51273 11.9138C3.50022 11.8834 3.49792 11.8498 3.50617 11.818C3.51442 11.7862 3.53278 11.7579 3.55848 11.7375L11.7125 4.062C11.9257 3.86178 12.2071 3.75032 12.4996 3.75032C12.7921 3.75032 13.0735 3.86178 13.2867 4.062L21.4625 11.7578C21.5187 11.8058 21.4977 11.883 21.4865 11.9138Z"
                                                        fill="white" />
                                                </svg>
                                                <span>Acheter/Vendre</span>
                                            </a>
                                        </div> --}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Header -->
            @include('partials.frontoffice.home_header')
            <!-- End Main Header -->

            <!-- slider -->
            <section class="slider home2">
                <div class="slider-item">
                    <div class="container relative">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="content po-content-two">
                                    <div class="heading center">
                                        <h1 class="text-color-1 wow text-custom " data-wow-delay="50ms"
                                            data-wow-duration="1000ms">{{--Avec elycha vos desirs trouve toujours satifaction --}}</h1>
                                        {{-- <p class="fs-16 lh-24 text-color-1 fw-6">Explorez notre vaste sélection
                                            d'appartements, maisons, villas, voitures et terrains disponibles à la location,
                                            à la vente ou en bail, le tout soigneusement sélectionné par nos agents de
                                            confiance.</p> --}}
                                    </div>

                                    @include('partials.frontoffice.home_searchbar')
                                    {{-- <div class="wrap-icon flex align-center justify-center link-style-3">
                                        <div class="icon-box fs-13 "><span class="icons-house icon-house-1"></span><a
                                                href="#">Houses</a></div>
                                        <div class="icon-box fs-13"><span class="icons-house icon-house-2"></span><a
                                                href="#">Villa</a></div>
                                        <div class="icon-box fs-13"><span class="icons-house icon-house-3"></span><a
                                                href="#">Office</a></div>
                                        <div class="icon-box fs-13"><span class="icons-house icon-house-4"></span><a
                                                href="#">Apartments</a></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="flat-sale wg-dream tf-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section center">
                                <h2>Découvrez les dernières publications.</h2>
                                <p class="text-color-4">Les publications les plus recentes.</p>
                            </div>
                                <div class="swiper-container2">
                                    <div class="one-carousel owl-carousel owl-theme">
                                        @foreach ($lastPostsImmo as $post)
                                            <div class="slide-item">
                                                <div class="box box-dream hv-one">
                                                    <div class="image-group relative ">
                                                        <span class="featured fs-12 fw-6">
                                                            @if ($post?->category?->type == 1)
                                                                Vente
                                                            @elseif ($post?->category?->type == 2)
                                                                Location
                                                            @else
                                                            @endif
                                                        </span>
                                                        <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                        <div class="swiper-container noo carousel-2 img-style">
                                                            <a href="/posts/details/{{ $post?->id }}"
                                                                class="icon-plus"><img
                                                                    src="/front/assets/images/icon/plus.svg"
                                                                    alt="images"></a>
                                                                    <div class="swiper-wrapper">
                                                                        {{-- Photo principale --}}
                                                                        @if ($post?->images)
                                                                            <div class="swiper-slide">
                                                                                <img src="{{ asset('storage/'.$post->images->first()?->path) }}" alt="image principale" style="height: 300px; width: 100%; object-fit: cover;">
                                                                            </div>
                                                                        @endif

                                                                        {{-- Autres images --}}
                                                                        @foreach($post->images as $photo)
                                                                            <div class="swiper-slide">
                                                                                <img src="{{ asset( 'storage/'.$photo->path ) }}" alt="image supplémentaire"
                                                                                    style="height: 300px; width: 100%; object-fit: cover;">
                                                                            </div>
                                                                        @endforeach
                                                                    </div>

                                                            <div class="pagi2">
                                                                <div class="swiper-pagination2"> </div>
                                                            </div>
                                                            <div class="swiper-button-next2 "><i
                                                                    class="fal fa-arrow-right"></i>
                                                            </div>
                                                            <div class="swiper-button-prev2 "><i
                                                                    class="fal fa-arrow-left"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="link-style-1"><a
                                                                href="/posts/details/{{ $post?->id }}">{{ $post?->label }}</a>
                                                        </h3>
                                                        <div class="text-address">
                                                            <p class="p-12">{{ $post?->place }}</p>
                                                        </div>
                                                        <div class="money fs-18 fw-6 text-color-3"><a
                                                                href="/posts/details/{{ $post?->id }}">{{ $post?->price }}
                                                                Fcfa</a>
                                                        </div>
                                                        <div class="days-box flex justify-space align-center">
                                                            <div class="img-author hv-tool" data-tooltip="Kathryn Murphy"><img
                                                                    src="{{ $post?->user?->avatar }}" class="rounded-circle"
                                                                    style="width: 35px" alt="images">
                                                            </div>
                                                            <div class="days">
                                                                {{ formatDate($post?->created_at) }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="flat-sale wg-dream tf-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section ">
                                <h2>Elycha – L’innovation au service de votre avenir au Togo (lomé) et au delà de nos frontières </h2>
                                <p class="text-color-4">Elycha est une entreprise basé au Togo (lomé) dynamique et multidisciplinaire qui révolutionne plusieurs secteurs clés grâce à son expertise et son engagement envers l'excellence. Nous offrons des solutions sur mesure au Togo(lomé)

                                    Grâce à une équipe de professionnels qualifiés et des technologies de pointe, Elycha transforme vos projets en succès. Faires confiance à notre expertise pour des solutions innovantes, fiables et adaptées à vos besoins.
                                    <br>

                                    🔹 Elycha, non pas seulement l’excellence à votre service mais là où vos besoins trouvent toujours satisfaction </p>
                            </div>
                            <div class="swiper-container2">
                                <div class="one-carousel owl-carousel owl-theme">
                                    @foreach ($images as $image)
                                        <div class="slide-item">
                                            <div class="box box-dream hv-one">
                                                <div class="image-group relative ">

                                                    <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                    <div class="swiper-container noo carousel-2 img-style">

                                                        <div class="swiper-wrapper ">
                                                            <div class="swiper-slide"><img src="{{ $image }}"
                                                                    alt="images" style="height: 300px"></div>

                                                                <div class="swiper-slide">  </div>

                                                        </div>
                                                        <div class="pagi2">
                                                            <div class="swiper-pagination2"> </div>
                                                        </div>
                                                        <div class="swiper-button-next2 "><i
                                                                class="fal fa-arrow-right"></i>
                                                        </div>
                                                        <div class="swiper-button-prev2 "><i
                                                                class="fal fa-arrow-left"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">


                                                    <div class="money fs-18 fw-6 text-color-3">
                                                    </div>
                                                    <div class="days-box flex justify-space align-center">


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="flat-sale wg-dream tf-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section ">
                                <h2>IMMOBILIER & GESTION FONCIÈRE</h2>
                                <p class="text-color-4"> ✔ Achat, Vente & Location : Accompagnement des clients dans l’acquisition, la cession ou la location de biens immobiliers.
                                    <br>
                                    ✔ Achat, Vente & Location au Togo (lomé? Accompagnement des clients dans l’acquisition, la cession ou la location de biens immobiliers au Togo)<br>
                                    ✔ Gestion immobilière : l'assurance et la rentabilité de vos investissements au Togo (lomé)  fait notre priorité même avec des retard de paiement chez le locataire la société ELYCHA vous verse votre loyer <br>
                                    ✔ Topographie : Études et levés topographiques pour la délimitation des terrains et la planification des projets immobiliers partout sur le territoire togolais
                                </p>
                            </div>
                            <div class="swiper-container2">
                                <div class="one-carousel owl-carousel owl-theme">
                                    @foreach ($images2 as $image)
                                        <div class="slide-item">
                                            <div class="box box-dream hv-one">
                                                <div class="image-group relative ">

                                                    <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                    <div class="swiper-container noo carousel-2 img-style">

                                                        <div class="swiper-wrapper ">
                                                            <div class="swiper-slide"><img src="{{ $image }}"
                                                                    alt="images" style="height: 300px"></div>

                                                                <div class="swiper-slide">  </div>

                                                        </div>
                                                        <div class="pagi2">
                                                            <div class="swiper-pagination2"> </div>
                                                        </div>
                                                        <div class="swiper-button-next2 "><i
                                                                class="fal fa-arrow-right"></i>
                                                        </div>
                                                        <div class="swiper-button-prev2 "><i
                                                                class="fal fa-arrow-left"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">


                                                    <div class="money fs-18 fw-6 text-color-3">
                                                    </div>
                                                    <div class="days-box flex justify-space align-center">


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="flat-sale wg-dream tf-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section ">
                                <h2>BTP & INFRASTRUCTURES</h2>
                                <p class="text-color-4">
                                    ✔ Bâtiment et Travaux Publics (BTP) : Conception, construction et rénovation de bâtiments résidentiels, commerciaux et industriels.>
                                    <br>
                                    ✔ Génie civil : Études et réalisations d’infrastructures comme les routes, ponts, barrages et bâtiments publics.
                                    <br>
                                    ✔ Forage : Installation de puits et systèmes d’approvisionnement en eau potable ou industrielle.
                                    <br>

                                    ✔ Piscine : Conception, construction et entretien de piscines privées et publiques pour le bien-être des togolais
                                 </p>
                            </div>
                            <div class="swiper-container2">
                                <div class="one-carousel owl-carousel owl-theme">
                                    @foreach ($images3 as $image)
                                        <div class="slide-item">
                                            <div class="box box-dream hv-one">
                                                <div class="image-group relative ">

                                                    <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                    <div class="swiper-container noo carousel-2 img-style">

                                                        <div class="swiper-wrapper ">
                                                            <div class="swiper-slide"><img src="{{ $image }}"
                                                                    alt="images" style="height: 300px"></div>

                                                                <div class="swiper-slide">  </div>

                                                        </div>
                                                        <div class="pagi2">
                                                            <div class="swiper-pagination2"> </div>
                                                        </div>
                                                        <div class="swiper-button-next2 "><i
                                                                class="fal fa-arrow-right"></i>
                                                        </div>
                                                        <div class="swiper-button-prev2 "><i
                                                                class="fal fa-arrow-left"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">


                                                    <div class="money fs-18 fw-6 text-color-3">
                                                    </div>
                                                    <div class="days-box flex justify-space align-center">


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="flat-sale wg-dream tf-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section ">
                                <h2>ÉNERGIE & CLIMATISATION</h2>
                                <p class="text-color-4">
                                    ✔ Énergie solaire : Installation et maintenance de solutions solaires (panneaux photovoltaïques, systèmes d’éclairage autonome, etc.).
                                    <br>
                                    ✔ Génie électrique : Études et mise en œuvre de réseaux électriques pour les bâtiments et infrastructures.
                                    <br>
                                    ✔ Climatisation : Installation et entretien de systèmes de climatisation et de ventilation pour le confort thermique.
                                    <br>
                                 </p>
                            </div>
                            <div class="swiper-container2">
                                <div class="one-carousel owl-carousel owl-theme">
                                    @foreach ($images4 as $image)
                                        <div class="slide-item">
                                            <div class="box box-dream hv-one">
                                                <div class="image-group relative ">

                                                    <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                    <div class="swiper-container noo carousel-2 img-style">

                                                        <div class="swiper-wrapper ">
                                                            <div class="swiper-slide"><img src="{{ $image }}"
                                                                    alt="images" style="height: 300px"></div>

                                                                <div class="swiper-slide">  </div>

                                                        </div>
                                                        <div class="pagi2">
                                                            <div class="swiper-pagination2"> </div>
                                                        </div>
                                                        <div class="swiper-button-next2 "><i
                                                                class="fal fa-arrow-right"></i>
                                                        </div>
                                                        <div class="swiper-button-prev2 "><i
                                                                class="fal fa-arrow-left"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">


                                                    <div class="money fs-18 fw-6 text-color-3">
                                                    </div>
                                                    <div class="days-box flex justify-space align-center">


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="flat-sale wg-dream tf-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section ">
                                <h2>TECHNOLOGIES & SÉCURITÉ</h2>
                                <p class="text-color-4">
                                    ✔ Systèmes informatiques : Développement, maintenance et intégration de solutions informatiques adaptées aux besoins des entreprises et particuliers.
                                    <br>
                                    ✔ Télécommunications : Mise en place de réseaux télécoms et solutions de connectivité avancées.
                                    <br>
                                    ✔ Contrôle d’accès : Sécurisation des bâtiments et sites sensibles via des systèmes de surveillance et d’accès intelligents.
                                    <br>
                                    <br>
                                    Avec cette expertise variée au Togo (lomé), Elycha se positionne comme un acteur clé pour accompagner ses clients dans leurs projets, en garantissant qualité, innovation et satisfaction.

                                    <br>
                                    <br>
                                    Contacter-nous des aujourd'hui pour concrétiser vos projets avec succès !
                                    Lomé-Togo
                                     </b>
                                 </p>
                            </div>
                            <div class="swiper-container2">
                                <div class="one-carousel owl-carousel owl-theme">
                                    @foreach ($images5   as $image)
                                        <div class="slide-item">
                                            <div class="box box-dream hv-one">
                                                <div class="image-group relative ">

                                                    <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                    <div class="swiper-container noo carousel-2 img-style">

                                                        <div class="swiper-wrapper ">
                                                            <div class="swiper-slide"><img src="{{ $image }}"
                                                                    alt="images" style="height: 300px"></div>

                                                                <div class="swiper-slide">  </div>

                                                        </div>
                                                        <div class="pagi2">
                                                            <div class="swiper-pagination2"> </div>
                                                        </div>
                                                        <div class="swiper-button-next2 "><i
                                                                class="fal fa-arrow-right"></i>
                                                        </div>
                                                        <div class="swiper-button-prev2 "><i
                                                                class="fal fa-arrow-left"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">


                                                    <div class="money fs-18 fw-6 text-color-3">
                                                    </div>
                                                    <div class="days-box flex justify-space align-center">


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="flat-sale wg-dream tf-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="heading-section">
                                <h2>Elycha App</h2>
                                <p class="text-color-4">Téléchargez l'application maintenant</p>
                            </div>

                            <div class="app-buttons">
                                <a href="https://play.google.com/store/apps" target="_blank">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg"
                                         alt="Google Play" class="store-badge">
                                </a>

                                <a href="https://www.apple.com/app-store/" target="_blank">
                                    <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg"
                                         alt="App Store" class="store-badge">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section class="flat-sale wg-dream tf-section2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="heading-section">

                                <p class="text-color-4">Découvrez nous sur nos réseaux sociaux</p>
                            </div>

                            <div class="app-buttons">
                                <div class="icon-socials box-3 text-color-1 flex items-center gap-3">
                                    <a target="_blank" href="https://www.facebook.com/profile.php?id=61554554742886" class="social-link">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a target="_blank" href="https://www.linkedin.com/in/alkebulan-eca-9a644b2a6/" class="social-link">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a target="_blank" href="https://www.instagram.com/alkebulan.eca/" class="social-link">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a target="_blank" href="https://www.tiktok.com/@elychasarl?_t=ZM-8uOrB6vlZGp&_r=1" class="social-link">
                                        <i class="fab fa-tiktok"></i>
                                    </a>
                                    <a target="_blank" href="#" class="social-link">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>

                            </div>


                        </div>

                    </div>

                </div>
            </section>


    {{-- <section class="flat-sale wg-dream tf-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center">
                        <h2>Publications mises en avant</h2>
                        <p class="text-color-4">Les publications les plus intéressantes.</p>
                    </div>
                    <div class="swiper-container2">
                        <div class="one-carousel owl-carousel owl-theme">
                            @foreach ($featuredPosts as $post?)
                                <div class="slide-item">
                                    <div class="box box-dream hv-one">
                                        <div class="image-group relative ">
                                            <span class="featured fs-12 fw-6">
                                                @if ($post?->category->type == 1)
                                                    Vente
                                                @elseif ($post?->category->type == 2)
                                                    Location
                                                @else
                                                @endif
                                            </span>
                                            <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                            <div class="swiper-container noo carousel-2 img-style">
                                                <a href="/posts/details/{{ $post?->id }}"
                                                    class="icon-plus"><img
                                                        src="/front/assets/images/icon/plus.svg"
                                                        alt="images"></a>
                                                <div class="swiper-wrapper ">
                                                    <div class="swiper-slide"><img src="{{ $post?->photo }}"
                                                            alt="images" style="height: 300px"></div>
                                                    @foreach ($post?->images as $image)
                                                        <div class="swiper-slide"><img src="{{ $image->photo }}"
                                                                alt="images" style="height: 300px"></div>
                                                    @endforeach
                                                </div>
                                                <div class="pagi2">
                                                    <div class="swiper-pagination2"> </div>
                                                </div>
                                                <div class="swiper-button-next2 "><i
                                                        class="fal fa-arrow-right"></i>
                                                </div>
                                                <div class="swiper-button-prev2 "><i
                                                        class="fal fa-arrow-left"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h3 class="link-style-1"><a
                                                    href="/posts/details/{{ $post?->id }}">{{ $post?->label }}</a>
                                            </h3>
                                            <div class="text-address">
                                                <p class="p-12">{{ $post?->place }}</p>
                                            </div>
                                            <div class="money fs-18 fw-6 text-color-3"><a
                                                    href="/posts/details/{{ $post?->id }}">{{ $post?->price }}
                                                    Fcfa</a>
                                            </div>
                                            <div class="days-box flex justify-space align-center">
                                                <div class="img-author hv-tool" data-tooltip="Kathryn Murphy"><img
                                                        src="{{ $post?->user->avatar }}" class="rounded-circle"
                                                        style="width: 35px" alt="images">
                                                </div>
                                                <div class="days">
                                                    {{ formatDate($post?->created_at) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-featured wg-dream home2 tf-section">
        <div class="container5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center">
                        <h2>Publications automobiles</h2>
                        <p class="text-color-4">Les dernières publication en matière d'automobiles</p>
                    </div>

                    <div class="col-lg-12 wrap-tabs">
                        <div class="flat-tabs themesflat-tabs">
                            <div class="box-tab center">
                                <ul class="menu-tab tab-title flex justify-center">
                                    <li class="item-title hv-tool active">
                                        <h5 class="inner">
                                            Location
                                        </h5>
                                    </li>
                                    <li class="item-title hv-tool">
                                        <h5 class="inner">
                                            Vente
                                        </h5>
                                    </li>
                                    <li class="item-title hv-tool">
                                        <h5 class="inner">
                                            Pièces détachées
                                        </h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="content-tab">

                                <div class="content-inner tab-content">
                                    <div class="swiper-container2">
                                        <div class="three-carousel owl-carousel owl-theme ">
                                            @foreach ($categories2 as $item)
                                                @if ($item->type == 2)
                                                    @foreach ($item->posts as $post?)
                                                        @if ($post?->status == 1)
                                                            <div class="slide-item">
                                                                <div class="box box-dream hv-one">
                                                                    <div class="image-group relative ">
                                                                        <span class="featured fs-12 fw-6">
                                                                            @if ($post?->category->type == 1)
                                                                                Vente
                                                                            @elseif($post?->category->type == 2)
                                                                                Location
                                                                            @else
                                                                            @endif
                                                                        </span>
                                                                        <span class="icon-bookmark"><i
                                                                                class="far fa-bookmark"></i></span>
                                                                        <div
                                                                            class="swiper-container noo carousel-2 img-style">
                                                                            <a href="/posts/details/{{ $post?->id }}"
                                                                                class="icon-plus"><img
                                                                                    src="/front/assets/images/icon/plus.svg"
                                                                                    alt="images"></a>
                                                                            <div class="swiper-wrapper ">
                                                                                <div class="swiper-slide"><img
                                                                                        src="{{ $post?->photo }}"
                                                                                        alt="images"
                                                                                        style="height: 250px">
                                                                                </div>
                                                                                @foreach ($post?->images as $image)
                                                                                    <div class="swiper-slide"><img
                                                                                            src="{{ $image->photo }}"
                                                                                            alt="images"
                                                                                            style="height: 250px">
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="pagi2">
                                                                                <div class="swiper-pagination2">
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-button-next2 "><i
                                                                                    class="fal fa-arrow-right"></i>
                                                                            </div>
                                                                            <div class="swiper-button-prev2 "><i
                                                                                    class="fal fa-arrow-left"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h3 class="link-style-1"><a
                                                                                href="/posts/details/{{ $post?->id }}">{{ $post?->label }}</a>
                                                                        </h3>
                                                                        <div class="text-address">
                                                                            <p class="p-12">{{ $post?->place }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="money fs-18 fw-6 text-color-3">
                                                                            <a
                                                                                href="/posts/details/{{ $post?->id }}">{{ $post?->price }}
                                                                                Fcfa</a>
                                                                        </div>
                                                                        <div
                                                                            class="days-box flex justify-space align-center">

                                                                            <div class="img-author hv-tool"
                                                                                data-tooltip="Kathryn Murphy"><img
                                                                                    src="{{ $post?->user->avatar }}"
                                                                                    class="rounded-circle"
                                                                                    style="width: 35px"
                                                                                    alt="images">
                                                                            </div>
                                                                            <div class="days">
                                                                                {{ formatDate($post?->created_at) }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="content-inner tab-content">
                                    <div class="swiper-container2">
                                        <div class="three-carousel owl-carousel owl-theme ">
                                            @foreach ($categories2 as $item)
                                                @if ($item->type == 1)
                                                    @foreach ($item->posts as $post?)
                                                        @if ($post?->status == 1)
                                                            <div class="slide-item">
                                                                <div class="box box-dream hv-one">
                                                                    <div class="image-group relative ">
                                                                        <span class="featured fs-12 fw-6">
                                                                            @if ($post?->category->type == 1)
                                                                                Vente
                                                                            @elseif($post?->category->type == 2)
                                                                                Location
                                                                            @else
                                                                            @endif
                                                                        </span>
                                                                        <span class="icon-bookmark"><i
                                                                                class="far fa-bookmark"></i></span>
                                                                        <div
                                                                            class="swiper-container noo carousel-2 img-style">
                                                                            <a href="/posts/details/{{ $post?->id }}"
                                                                                class="icon-plus"><img
                                                                                    src="/front/assets/images/icon/plus.svg"
                                                                                    alt="images"></a>
                                                                            <div class="swiper-wrapper ">
                                                                                <div class="swiper-slide"><img
                                                                                        src="{{ $post?->photo }}"
                                                                                        alt="images"
                                                                                        style="height: 250px">
                                                                                </div>
                                                                                @foreach ($post?->photos as $image)
                                                                                    <div class="swiper-slide"><img
                                                                                            src="{{ $image->photo }}"
                                                                                            alt="images"
                                                                                            style="height: 250px">
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="pagi2">
                                                                                <div class="swiper-pagination2">
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-button-next2 "><i
                                                                                    class="fal fa-arrow-right"></i>
                                                                            </div>
                                                                            <div class="swiper-button-prev2 "><i
                                                                                    class="fal fa-arrow-left"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h3 class="link-style-1"><a
                                                                                href="/posts/details/{{ $post?->id }}">{{ $post?->label }}</a>
                                                                        </h3>
                                                                        <div class="text-address">
                                                                            <p class="p-12">{{ $post?->place }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="money fs-18 fw-6 text-color-3">
                                                                            <a
                                                                                href="/posts/details/{{ $post?->id }}">{{ $post?->price }}
                                                                                Fcfa</a>
                                                                        </div>
                                                                        <div
                                                                            class="days-box flex justify-space align-center">

                                                                            <div class="img-author hv-tool"
                                                                                data-tooltip="Kathryn Murphy"><img
                                                                                    src="{{ $post?->user->avatar }}"
                                                                                    class="rounded-circle"
                                                                                    style="width: 35px"
                                                                                    alt="images">
                                                                            </div>
                                                                            <div class="days">
                                                                                {{ formatDate($post?->created_at) }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="content-inner tab-content">
                                    <div class="swiper-container2">
                                        <div class="three-carousel owl-carousel owl-theme ">
                                            @foreach ($categories2 as $item)
                                                @if ($item->type == 3)
                                                    @foreach ($item->posts as $post?)
                                                        @if ($post?->status == 1)
                                                            <div class="slide-item">
                                                                <div class="box box-dream hv-one">
                                                                    <div class="image-group relative ">
                                                                        <span class="featured fs-12 fw-6">
                                                                            @if ($post?->category->type == 1)
                                                                                Vente
                                                                            @elseif($post?->category->type == 2)
                                                                                Location
                                                                            @else
                                                                            @endif
                                                                        </span>
                                                                        <span class="icon-bookmark"><i
                                                                                class="far fa-bookmark"></i></span>
                                                                        <div
                                                                            class="swiper-container noo carousel-2 img-style">
                                                                            <a href="/posts/details/{{ $post?->id }}"
                                                                                class="icon-plus"><img
                                                                                    src="/front/assets/images/icon/plus.svg"
                                                                                    alt="images"></a>
                                                                            <div class="swiper-wrapper ">
                                                                                <div class="swiper-slide"><img
                                                                                        src="{{ $post?->photo }}"
                                                                                        alt="images"
                                                                                        style="height: 250px">
                                                                                </div>
                                                                                @foreach ($post?->photos as $image)
                                                                                    <div class="swiper-slide"><img
                                                                                            src="{{ $image->photo }}"
                                                                                            alt="images"
                                                                                            style="height: 250px">
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="pagi2">
                                                                                <div class="swiper-pagination2">
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-button-next2 "><i
                                                                                    class="fal fa-arrow-right"></i>
                                                                            </div>
                                                                            <div class="swiper-button-prev2 "><i
                                                                                    class="fal fa-arrow-left"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h3 class="link-style-1"><a
                                                                                href="/posts/details/{{ $post?->id }}">{{ $post?->label }}</a>
                                                                        </h3>
                                                                        <div class="text-address">
                                                                            <p class="p-12">{{ $post?->place }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="money fs-18 fw-6 text-color-3">
                                                                            <a
                                                                                href="/posts/details/{{ $post?->id }}">{{ $post?->price }}
                                                                                Fcfa</a>
                                                                        </div>
                                                                        <div
                                                                            class="days-box flex justify-space align-center">

                                                                            <div class="img-author hv-tool"
                                                                                data-tooltip="Kathryn Murphy"><img
                                                                                    src="{{ $post?->user->avatar }}"
                                                                                    class="rounded-circle"
                                                                                    style="width: 35px"
                                                                                    alt="images">
                                                                            </div>
                                                                            <div class="days">
                                                                                {{ formatDate($post?->created_at) }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                                {{-- @foreach ($categories2 as $categorie)
                                @if ($categorie->id != $item->id)
                                    <div class="content-inner tab-content">
                                        <div class="swiper-container2">
                                            <div class="three-carousel owl-carousel owl-theme ">
                                                @foreach ($categorie->posts as $post?)
                                                    @if ($post?->status == 1)
                                                        <div class="slide-item">
                                                            <div class="box box-dream hv-one">
                                                                <div class="image-group relative ">
                                                                    <span class="featured fs-12 fw-6">
                                                                        @if ($post?->category->type == 1)
                                                                            Vente
                                                                        @elseif($post?->category->type == 2)
                                                                            Location
                                                                        @else
                                                                        @endif
                                                                    </span>
                                                                    <span class="icon-bookmark"><i
                                                                            class="far fa-bookmark"></i></span>
                                                                    <div
                                                                        class="swiper-container noo carousel-2 img-style">
                                                                        <a href="/posts/details/{{ $post?->id }}"
                                                                            class="icon-plus"><img
                                                                                src="/front/assets/images/icon/plus.svg"
                                                                                alt="images"></a>
                                                                        <div class="swiper-wrapper ">
                                                                            <div class="swiper-slide"><img
                                                                                    src="{{ $post?->photo }}"
                                                                                    alt="images"
                                                                                    style="height: 250px">
                                                                            </div>
                                                                            @foreach ($post?->photos as $image)
                                                                                <div class="swiper-slide"><img
                                                                                        src="{{ $image->photo }}"
                                                                                        alt="images"
                                                                                        style="height: 250px">
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="pagi2">
                                                                            <div class="swiper-pagination2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="swiper-button-next2 "><i
                                                                                class="fal fa-arrow-right"></i>
                                                                        </div>
                                                                        <div class="swiper-button-prev2 "><i
                                                                                class="fal fa-arrow-left"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="content">
                                                                    <h3 class="link-style-1"><a
                                                                            href="/posts/details/{{ $post?->id }}">{{ $post?->label }}</a>
                                                                    </h3>
                                                                    <div class="text-address">
                                                                        <p class="p-12">{{ $post?->place }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="money fs-18 fw-6 text-color-3">
                                                                        <a
                                                                            href="/posts/details/{{ $post?->id }}">{{ $post?->price }}
                                                                            Fcfa</a>
                                                                    </div>

                                                                    <div
                                                                        class="days-box flex justify-space align-center">

                                                                        <div class="img-author hv-tool"
                                                                            data-tooltip="Kathryn Murphy"><img
                                                                                src="{{ $post?->user->avatar }}"
                                                                                class="rounded-circle"
                                                                                style="width: 35px"
                                                                                alt="images">
                                                                        </div>
                                                                        <div class="days">
                                                                            {{ formatDate($post?->created_at) }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            </div>

                            {{-- <div class="swiper-container">
                        <div class="four-carousel owl-carousel owl-theme ">
                            @foreach ($lastPostsAuto as $post?)
                                <div class="slide-item">
                                    <div class="box box-dream flex hv-one">
                                        <div class="image-group relative  ">
                                            <span class="featured fs-12 fw-6">
                                                @if ($post?->category->type == 1)
                                                    Vente
                                                @elseif ($post?->category->type == 2)
                                                    Location
                                                @else
                                                @endif
                                            </span>
                                            <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                            <div class="swiper-container noo carousel-2 img-style "
                                                data-chat="person1">
                                                <a href="/posts/details/{{ $post?->id }}"
                                                    class="icon-plus"><img
                                                        src="/front/assets/images/icon/plus.svg"
                                                        alt="images"></a>
                                                <div class="swiper-wrapper ">
                                                    <div class="swiper-slide"><img src="{{ $post?->photo }}"
                                                            alt="images" style="height: 250px"></div>
                                                    @foreach ($post?->photos as $image)
                                                        <div class="swiper-slide"><img src="{{ $image->photo }}"
                                                                alt="images" style="height: 250px"></div>
                                                    @endforeach
                                                </div>
                                                <div class="pagi2">
                                                    <div class="swiper-pagination2"> </div>
                                                </div>
                                                <div class="swiper-button-next2 "><i
                                                        class="fal fa-arrow-right"></i>
                                                </div>
                                                <div class="swiper-button-prev2 "><i
                                                        class="fal fa-arrow-left"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h3 class="link-style-1"><a
                                                    href="/posts/details/{{ $post?->id }}">{{ $post?->label }}</a>
                                            </h3>
                                            <div class="text-address">
                                                <p class="p-12">{{ $post?->place }}</p>
                                            </div>
                                            <div class="money fs-20 fw-8 font-2 text-color-3"><a
                                                    href="/posts/details/{{ $post?->id }}">{{ $post?->price }}
                                                    Fcfa</a></div>
                                            <div class="img-box flex justify-space align-center">
                                                <div class="img-author flex align-center"><img
                                                        src="{{ $post?->user->avatar }}" alt="images">
                                                    <div class="fs-13 fw-6 link-style-1"><a
                                                            href="#">{{ $post?->user->first_name }}
                                                            {{ $post?->user->last_name }}</a></div>
                                                </div>
                                                <a class="icon-repeat">
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5 14L2 11M2 11L5 8M2 11H11M11 2L14 5M14 5L11 8M14 5H5"
                                                            stroke="#1C1C1E" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div> --}}
                        {{-- </div>
                    </div>
                </div>
    </section>  --}}
{{--
    <section class="flat-agents" style="margin-bottom: 30px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="heading-section center">
                        <h2>Devenez un agent</h2>
                        <p class="text-1 text-color-4">Avec un compte "Agent", vous pourriez effectuer des
                            publications sur la plateforme.</p>
                        <div class="icon-img">
                            <img src="/front/assets/images/icon/agents.svg" alt="images">
                        </div>
                        <h4 class="text-2 fw-5">Êtes-vous un agent passionné de l'immobilier ou de l'automobile
                            à la recherche de nouvelles voies pour développer votre entreprise ?
                            Chez <b>Alkebulan-Eca</b>, nous vous offrons une plateforme polyvalente pour élargir
                            votre portefeuille et atteindre de nouveaux sommets dans les secteurs immobilier et
                            automobile.</h4>
                        <div class="button-box flex justify-center">
                            <div class="button-two">
                                <a class="sc-button" href="/contact">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.25 6.75C2.25 15.034 8.966 21.75 17.25 21.75H19.5C20.0967 21.75 20.669 21.5129 21.091 21.091C21.5129 20.669 21.75 20.0967 21.75 19.5V18.128C21.75 17.612 21.399 17.162 20.898 17.037L16.475 15.931C16.035 15.821 15.573 15.986 15.302 16.348L14.332 17.641C14.05 18.017 13.563 18.183 13.122 18.021C11.4849 17.4191 9.99815 16.4686 8.76478 15.2352C7.53141 14.0018 6.58087 12.5151 5.979 10.878C5.817 10.437 5.983 9.95 6.359 9.668L7.652 8.698C8.015 8.427 8.179 7.964 8.069 7.525L6.963 3.102C6.90214 2.85869 6.76172 2.6427 6.56405 2.48834C6.36638 2.33397 6.1228 2.25008 5.872 2.25H4.5C3.90326 2.25 3.33097 2.48705 2.90901 2.90901C2.48705 3.33097 2.25 3.90326 2.25 4.5V6.75Z"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                    <span style="font-size:10px">Contactez-nous</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="video-box ">
                        <div class="post-video text-end ">
                            <img class="img-2" src="/front/assets/images/home_bottom.png" alt="images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Footer -->
    @include('partials.frontoffice.home_footer')
    <!-- /#footer -->



    <!-- Bottom -->
</div>
<!-- /#page -->

</div>
@endsection
