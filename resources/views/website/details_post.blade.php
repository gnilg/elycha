@extends('layouts.website_layout')
@section('config')
    <meta data-rh="true" property="og:title" content="{{ $post->label }}">
    <meta data-rh="true" property="og:image" content="https://alkebulan-eca.com/{{ $post->photo }}">
    <meta data-rh="true" property="og:url" content="https://alkebulan-eca.com/posts/details/{{ $post->id }}">
@endsection
@section('title')
    {{ $post->label }}
@endsection
@section('content')
    <section class="flat-title ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-inner style-detail">
                        <div class="title-group fs-12"><a class="home fw-6 text-color-3"
                                href="/">Accueil</a><span>{{ $post->label }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-slider01">
        <div class="container-full">
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper-container mainslider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="image-detail"
                                    style="height: 500px;background-color:black;background-image:url({{ $post->photo }});background-size:cover;background-position:center">
                                    {{-- <img src="{{ $post->photo }}" style="width: 100%;" alt="images"> --}}
                                </div>
                            </div>
                            @foreach ($post->photos as $photo)
                                <div class="swiper-slide">
                                    <div class="image-detail"
                                        style="height: 500px;background-color:black;background-image:url();background-size:cover;background-position:center">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-detail">
                                        <img src="{{ $photo->path }}" style="width: 100%" alt="images">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination5"></div>
                        <div class="button-custom-slider">
                            <div class="swiper-button-next5"><i class="far fa-chevron-down"></i></div>
                            <div class="swiper-button-prev5"><i class="far fa-chevron-up"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-property-detail style2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrap-house wg-dream flex bg-white">
                        <div class="box-1">
                            <div class="title-heading fs-30 fw-7 lh-45">{{ $post->label }}</div>
                            <div class="inner flex">
                                <div class="sales fs-12 fw-7 font-2 text-color-1">
                                    @if ($post->category?->type == 1)
                                        Vente
                                    @elseif ($post->category?->type == 2)
                                        Location
                                    @else
                                    @endif
                                </div>
                                <div class="text-address">
                                    <p>{{ $post->place }}</p>
                                </div>
                                <div class="icon-inner flex">
                                    <div class="years-icon flex align-center">
                                        <i class="fal fa-calendar"></i>
                                        <p class="text-color-2">{{ formatDate($post->created_at) }}</p>
                                    </div>
                                    <div class="view-icon flex align-center">
                                        <i class="far fa-eye"></i>
                                        <p class="text-color-2">{{$post->views}} vues</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-2 text-end">
                            <div class="icon-boxs flex">
                                <a href="https://wa.me/{{ $post->user->telephone }}?text=Bonjour {{ $post->user->last_name }}, votre annonce publiée sur Alkebulan-Eca m'intéresse. https://alkebulan-eca.com/posts/details/{{ $post->id }}""
                                    target="_blank" style="padding:10px;">
                                    <svg fill="#25d366" height="800px" width="800px" version="1.1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 308 308" xml:space="preserve">
                                        <g id="XMLID_468_">
                                            <path id="XMLID_469_"
                                                d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156
                                                                                                                          c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687
                                                                                                                          c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887
                                                                                                                          c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153
                                                                                                                          c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348
                                                                                                                          c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802
                                                                                                                          c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922
                                                                                                                          c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0
                                                                                                                          c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458
                                                                                                                          C233.168,179.508,230.845,178.393,227.904,176.981z" />
                                            <path id="XMLID_470_"
                                                d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716
                                                                                                                          c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396
                                                                                                                          c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z
                                                                                                                          M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188
                                                                                                                          l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677
                                                                                                                          c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867
                                                                                                                          C276.546,215.678,222.799,268.994,156.734,268.994z" />
                                        </g>
                                    </svg>
                                </a>

                            </div>
                            <div class="moneys fs-30 fw-7 lh-45 text-color-3">{{ $post->price }} Fcfa</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="post">
                        <div class="wrap-text wrap-style">
                            <h3 class="titles">Description</h3>
                            <p class="text-1 text-color-2">
                                {{ $post->description }}
                            </p>
                        </div>
                        @if ($post->latitude != null)
                            <div class="wrap-map wrap-property wrap-style">
                                <h3 class="titles">Localisation</h3>
                                <iframe class="map-content"
                                    src="https://maps.google.com/maps?q={{ $post->latitude }},{{ $post->longitude }}&hl=es;z=14&amp;output=embed"
                                    allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="side-bar side-bar-1">
                        <div class="inner-side-bar">
                            <div class="widget widget-listings style">
                                <h3 class="widget-title title-list">
                                    Publications similaires
                                </h3>
                                @foreach ($posts as $post)
                                    <div class="box-listings flex hover-img3">
                                        <div class="img-listings img-style3">
                                            <img src="{{ asset( $post->photos?->first()->path) }}" style="width:80px;" alt="images">
                                        </div>
                                        <div class="content link-style-1">
                                            <a class="fs-16 lh-24" href="/posts/details/{{ $post->id }}">
                                                {{ $post->label }}</a>
                                            <h4> {{ $post->price }} Fcfa</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="flat-sale-detail flat-sale wg-dream wg-dots tf-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section ">
                        <div class="title-heading fs-30 lh-45 fw-7">Featured properties</div>
                        <p class="text-color-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel
                            lobortis justo</p>
                    </div>
                    <div class="swiper-container2">
                        <div class="one-carousel owl-carousel owl-theme">
                            <div class="slide-item">
                                <div class="box box-dream hv-one">
                                    <div class="image-group relative ">
                                        <span class="featured fs-12 fw-6">Featured</span>
                                        <span class="featured style fs-12 fw-6">For sale</span>
                                        <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                        <div class="swiper-container noo carousel-2 img-style">
                                            <a href="/posts/details/{{ $post->id }}" class="icon-plus"><img
                                                    src="assets/images/icon/plus.svg" alt="images"></a>
                                            <div class="swiper-wrapper ">
                                                <div class="swiper-slide"><img src="assets/images/house/featured-21.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-2.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-3.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-4.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-5.jpg"
                                                        alt="images"></div>
                                            </div>
                                            <div class="pagi2">
                                                <div class="swiper-pagination2"> </div>
                                            </div>
                                            <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                            <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3 class="link-style-1"><a href="/posts/details/{{ $post->id }}">Gorgeous Apartment
                                                Building</a> </h3>
                                        <div class="text-address">
                                            <p class="p-12">58 Hullbrook Road, Billesley, B13 0LA</p>
                                        </div>
                                        <div class="money fs-18 fw-6 text-color-3"><a
                                                href="/posts/details/{{ $post->id }}">$7,500</a></div>
                                        <div class="icon-box flex">
                                            <div class="icons icon-1 flex text-color-4"><span>Beds: </span><span
                                                    class="fw-6">4</span></div>
                                            <div class="icons icon-2 flex"><span>Baths: </span><span
                                                    class="fw-6">2</span></div>
                                            <div class="icons icon-3 flex"><span>Sqft: </span><span
                                                    class="fw-6">1150</span></div>
                                        </div>
                                        <div class="days-box flex justify-space align-center">
                                            <a class="compare flex align-center fw-6" href="#">Compare</a>
                                            <div class="img-author hv-tool" data-tooltip="Kathryn Murphy"><img
                                                    src="assets/images/author/author-1.jpg" alt="images"></div>
                                            <div class="days">3 years ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="box box-dream hv-one">
                                    <div class="image-group relative ">
                                        <span class="featured fs-12 fw-6">Featured</span>
                                        <span class="featured style fs-12 fw-6">For sale</span>
                                        <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                        <div class="swiper-container noo carousel-2 img-style">
                                            <a href="/posts/details/{{ $post->id }}" class="icon-plus"><img
                                                    src="assets/images/icon/plus.svg" alt="images"></a>
                                            <div class="swiper-wrapper ">
                                                <div class="swiper-slide"><img src="assets/images/house/featured-22.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-2.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-3.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-4.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-5.jpg"
                                                        alt="images"></div>
                                            </div>
                                            <div class="pagi2">
                                                <div class="swiper-pagination2"> </div>
                                            </div>
                                            <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                            <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3 class="link-style-1"><a href="/posts/details/{{ $post->id }}">Gorgeous Apartment
                                                Building</a> </h3>
                                        <div class="text-address">
                                            <p class="p-12">58 Hullbrook Road, Billesley, B13 0LA</p>
                                        </div>
                                        <div class="money fs-18 fw-6 text-color-3"><a
                                                href="/posts/details/{{ $post->id }}">$7,500</a></div>
                                        <div class="icon-box flex">
                                            <div class="icons icon-1 flex text-color-4"><span>Beds: </span><span
                                                    class="fw-6">4</span></div>
                                            <div class="icons icon-2 flex"><span>Baths: </span><span
                                                    class="fw-6">2</span></div>
                                            <div class="icons icon-3 flex"><span>Sqft: </span><span
                                                    class="fw-6">1150</span></div>
                                        </div>
                                        <div class="days-box flex justify-space align-center">
                                            <a class="compare flex align-center fw-6" href="#">Compare</a>
                                            <div class="img-author hv-tool" data-tooltip="Kathryn Murphy"><img
                                                    src="assets/images/author/author-2.jpg" alt="images"></div>
                                            <div class="days">3 years ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box box-dream hv-one">
                                    <div class="image-group relative ">
                                        <span class="featured fs-12 fw-6">Featured</span>
                                        <span class="featured style fs-12 fw-6">For sale</span>
                                        <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                        <div class="swiper-container noo carousel-2 img-style">
                                            <a href="/posts/details/{{ $post->id }}" class="icon-plus"><img
                                                    src="assets/images/icon/plus.svg" alt="images"></a>
                                            <div class="swiper-wrapper ">
                                                <div class="swiper-slide"><img src="assets/images/house/featured-23.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-2.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-3.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-4.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-5.jpg"
                                                        alt="images"></div>
                                            </div>
                                            <div class="pagi2">
                                                <div class="swiper-pagination2"> </div>
                                            </div>
                                            <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                            <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3 class="link-style-1"><a href="/posts/details/{{ $post->id }}">Gorgeous Apartment
                                                Building</a> </h3>
                                        <div class="text-address">
                                            <p class="p-12">58 Hullbrook Road, Billesley, B13 0LA</p>
                                        </div>
                                        <div class="money fs-18 fw-6 text-color-3"><a
                                                href="/posts/details/{{ $post->id }}">$7,500</a></div>
                                        <div class="icon-box flex">
                                            <div class="icons icon-1 flex text-color-4"><span>Beds: </span><span
                                                    class="fw-6">4</span></div>
                                            <div class="icons icon-2 flex"><span>Baths: </span><span
                                                    class="fw-6">2</span></div>
                                            <div class="icons icon-3 flex"><span>Sqft: </span><span
                                                    class="fw-6">1150</span></div>
                                        </div>
                                        <div class="days-box flex justify-space align-center">
                                            <a class="compare flex align-center fw-6" href="#">Compare</a>
                                            <div class="img-author hv-tool" data-tooltip="Kathryn Murphy"><img
                                                    src="assets/images/author/author-3.jpg" alt="images"></div>
                                            <div class="days">3 years ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide ">
                                <div class="box box-dream hv-one">
                                    <div class="image-group relative ">
                                        <span class="featured fs-12 fw-6">Featured</span>
                                        <span class="featured style fs-12 fw-6">For sale</span>
                                        <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                        <div class="swiper-container noo carousel-2 img-style">
                                            <a href="/posts/details/{{ $post->id }}" class="icon-plus"><img
                                                    src="assets/images/icon/plus.svg" alt="images"></a>
                                            <div class="swiper-wrapper ">
                                                <div class="swiper-slide"><img src="assets/images/house/featured-8.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-2.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-3.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-4.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-5.jpg"
                                                        alt="images"></div>
                                            </div>
                                            <div class="pagi2">
                                                <div class="swiper-pagination2"> </div>
                                            </div>
                                            <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                            <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3 class="link-style-1"><a href="/posts/details/{{ $post->id }}">Gorgeous Apartment
                                                Building</a> </h3>
                                        <div class="text-address">
                                            <p class="p-12">58 Hullbrook Road, Billesley, B13 0LA</p>
                                        </div>
                                        <div class="money fs-18 fw-6 text-color-3"><a
                                                href="/posts/details/{{ $post->id }}">$7,500</a></div>
                                        <div class="icon-box flex">
                                            <div class="icons icon-1 flex text-color-4"><span>Beds: </span><span
                                                    class="fw-6">4</span></div>
                                            <div class="icons icon-2 flex"><span>Baths: </span><span
                                                    class="fw-6">2</span></div>
                                            <div class="icons icon-3 flex"><span>Sqft: </span><span
                                                    class="fw-6">1150</span></div>
                                        </div>
                                        <div class="days-box flex justify-space align-center">
                                            <a class="compare flex align-center fw-6" href="#">Compare</a>
                                            <div class="img-author hv-tool" data-tooltip="Kathryn Murphy"><img
                                                    src="assets/images/author/author-4.jpg" alt="images"></div>
                                            <div class="days">3 years ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="box box-dream hv-one">
                                    <div class="image-group relative ">
                                        <span class="featured fs-12 fw-6">Featured</span>
                                        <span class="featured style fs-12 fw-6">For sale</span>
                                        <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                        <div class="swiper-container noo carousel-2 img-style">
                                            <a href="/posts/details/{{ $post->id }}" class="icon-plus"><img
                                                    src="assets/images/icon/plus.svg" alt="images"></a>
                                            <div class="swiper-wrapper ">
                                                <div class="swiper-slide"><img src="assets/images/house/featured-21.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-2.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-3.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-4.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-5.jpg"
                                                        alt="images"></div>
                                            </div>
                                            <div class="pagi2">
                                                <div class="swiper-pagination2"> </div>
                                            </div>
                                            <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                            <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3 class="link-style-1"><a href="/posts/details/{{ $post->id }}">Gorgeous Apartment
                                                Building</a> </h3>
                                        <div class="text-address">
                                            <p class="p-12">58 Hullbrook Road, Billesley, B13 0LA</p>
                                        </div>
                                        <div class="money fs-18 fw-6 text-color-3"><a
                                                href="/posts/details/{{ $post->id }}">$7,500</a></div>
                                        <div class="icon-box flex">
                                            <div class="icons icon-1 flex text-color-4"><span>Beds: </span><span
                                                    class="fw-6">4</span></div>
                                            <div class="icons icon-2 flex"><span>Baths: </span><span
                                                    class="fw-6">2</span></div>
                                            <div class="icons icon-3 flex"><span>Sqft: </span><span
                                                    class="fw-6">1150</span></div>
                                        </div>
                                        <div class="days-box flex justify-space align-center">
                                            <a class="compare flex align-center fw-6" href="#">Compare</a>
                                            <div class="img-author hv-tool" data-tooltip="Kathryn Murphy"><img
                                                    src="assets/images/author/author-1.jpg" alt="images"></div>
                                            <div class="days">3 years ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="box box-dream hv-one">
                                    <div class="image-group relative ">
                                        <span class="featured fs-12 fw-6">Featured</span>
                                        <span class="featured style fs-12 fw-6">For sale</span>
                                        <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                        <div class="swiper-container noo carousel-2 img-style">
                                            <a href="/posts/details/{{ $post->id }}" class="icon-plus"><img
                                                    src="assets/images/icon/plus.svg" alt="images"></a>
                                            <div class="swiper-wrapper ">
                                                <div class="swiper-slide"><img src="assets/images/house/featured-22.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-2.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-3.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-4.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-5.jpg"
                                                        alt="images"></div>
                                            </div>
                                            <div class="pagi2">
                                                <div class="swiper-pagination2"> </div>
                                            </div>
                                            <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                            <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3 class="link-style-1"><a href="/posts/details/{{ $post->id }}">Gorgeous Apartment
                                                Building</a> </h3>
                                        <div class="text-address">
                                            <p class="p-12">58 Hullbrook Road, Billesley, B13 0LA</p>
                                        </div>
                                        <div class="money fs-18 fw-6 text-color-3"><a
                                                href="/posts/details/{{ $post->id }}">$7,500</a></div>
                                        <div class="icon-box flex">
                                            <div class="icons icon-1 flex text-color-4"><span>Beds: </span><span
                                                    class="fw-6">4</span></div>
                                            <div class="icons icon-2 flex"><span>Baths: </span><span
                                                    class="fw-6">2</span></div>
                                            <div class="icons icon-3 flex"><span>Sqft: </span><span
                                                    class="fw-6">1150</span></div>
                                        </div>
                                        <div class="days-box flex justify-space align-center">
                                            <a class="compare flex align-center fw-6" href="#">Compare</a>
                                            <div class="img-author hv-tool" data-tooltip="Kathryn Murphy"><img
                                                    src="assets/images/author/author-2.jpg" alt="images"></div>
                                            <div class="days">3 years ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box box-dream hv-one">
                                    <div class="image-group relative ">
                                        <span class="featured fs-12 fw-6">Featured</span>
                                        <span class="featured style fs-12 fw-6">For sale</span>
                                        <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                        <div class="swiper-container noo carousel-2 img-style">
                                            <a href="/posts/details/{{ $post->id }}" class="icon-plus"><img
                                                    src="assets/images/icon/plus.svg" alt="images"></a>
                                            <div class="swiper-wrapper ">
                                                <div class="swiper-slide"><img src="assets/images/house/featured-23.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-2.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-3.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-4.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-5.jpg"
                                                        alt="images"></div>
                                            </div>
                                            <div class="pagi2">
                                                <div class="swiper-pagination2"> </div>
                                            </div>
                                            <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                            <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3 class="link-style-1"><a href="/posts/details/{{ $post->id }}">Gorgeous Apartment
                                                Building</a> </h3>
                                        <div class="text-address">
                                            <p class="p-12">58 Hullbrook Road, Billesley, B13 0LA</p>
                                        </div>
                                        <div class="money fs-18 fw-6 text-color-3"><a
                                                href="/posts/details/{{ $post->id }}">$7,500</a></div>
                                        <div class="icon-box flex">
                                            <div class="icons icon-1 flex text-color-4"><span>Beds: </span><span
                                                    class="fw-6">4</span></div>
                                            <div class="icons icon-2 flex"><span>Baths: </span><span
                                                    class="fw-6">2</span></div>
                                            <div class="icons icon-3 flex"><span>Sqft: </span><span
                                                    class="fw-6">1150</span></div>
                                        </div>
                                        <div class="days-box flex justify-space align-center">
                                            <a class="compare flex align-center fw-6" href="#">Compare</a>
                                            <div class="img-author hv-tool" data-tooltip="Kathryn Murphy"><img
                                                    src="assets/images/author/author-3.jpg" alt="images"></div>
                                            <div class="days">3 years ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide ">
                                <div class="box box-dream hv-one">
                                    <div class="image-group relative ">
                                        <span class="featured fs-12 fw-6">Featured</span>
                                        <span class="featured style fs-12 fw-6">For sale</span>
                                        <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                        <div class="swiper-container noo carousel-2 img-style">
                                            <a href="/posts/details/{{ $post->id }}" class="icon-plus"><img
                                                    src="assets/images/icon/plus.svg" alt="images"></a>
                                            <div class="swiper-wrapper ">
                                                <div class="swiper-slide"><img src="assets/images/house/featured-8.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-2.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-3.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-4.jpg"
                                                        alt="images"></div>
                                                <div class="swiper-slide"><img src="assets/images/house/featured-5.jpg"
                                                        alt="images"></div>
                                            </div>
                                            <div class="pagi2">
                                                <div class="swiper-pagination2"> </div>
                                            </div>
                                            <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                            <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3 class="link-style-1"><a href="/posts/details/{{ $post->id }}">Gorgeous Apartment
                                                Building</a> </h3>
                                        <div class="text-address">
                                            <p class="p-12">58 Hullbrook Road, Billesley, B13 0LA</p>
                                        </div>
                                        <div class="money fs-18 fw-6 text-color-3"><a
                                                href="/posts/details/{{ $post->id }}">$7,500</a></div>
                                        <div class="icon-box flex">
                                            <div class="icons icon-1 flex text-color-4"><span>Beds: </span><span
                                                    class="fw-6">4</span></div>
                                            <div class="icons icon-2 flex"><span>Baths: </span><span
                                                    class="fw-6">2</span></div>
                                            <div class="icons icon-3 flex"><span>Sqft: </span><span
                                                    class="fw-6">1150</span></div>
                                        </div>
                                        <div class="days-box flex justify-space align-center">
                                            <a class="compare flex align-center fw-6" href="#">Compare</a>
                                            <div class="img-author hv-tool" data-tooltip="Kathryn Murphy"><img
                                                    src="assets/images/author/author-4.jpg" alt="images"></div>
                                            <div class="days">3 years ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <br>
    <br>
@endsection
