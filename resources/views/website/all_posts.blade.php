@extends('layouts.website_layout')
@section('title')
    Toutes les publications
@endsection
@section('content')
@php
    $activeType = request('type');
    $activeIsImmo = request('is_immo');
@endphp

    @if (request()->query('is_immo') == 1)
        <div class="top-filters">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-inner">
                            <div class="title-group fs-12"><a class="home fw-6 text-color-3"
                                    href="/">Immobilier</a><span>Toutes les publications</span></div>
                        </div>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="flat-tabs style2 flex">
                                <div class="box-tab flex center">
                                    <ul class="menu-tab tab-title flex">
                                        <li class="title-item flex align-center box-tab {{ $activeType == 1 ? 'active' : '' }}">
                                            <a href="{{ route('all.posts', ['is_immo' => 1, 'type' => 1]) }}" class="flex align-center">
                                                <i class="far fa-check-circle"></i>
                                                <h4 class="inner">Location</h4>
                                            </a>
                                        </li>
                                        <li class="item-title flex align-center box-tab {{ $activeType == 2 ? 'active' : '' }}">
                                            <a href="{{ route('all.posts', ['is_immo' => 1, 'type' => 2]) }}" class="flex align-center">
                                                <i class="far fa-check-circle"></i>
                                                <h4 class="inner">Vente</h4>
                                            </a>
                                        </li>
                                        <li class="item-title flex align-center box-tab {{ $activeType == 3 ? 'active' : '' }}">
                                            <a href="{{ route('all.posts', ['is_immo' => 1, 'type' => 3]) }}" class="flex align-center">
                                                <i class="far fa-check-circle"></i>
                                                <h4 class="inner">Bail</h4>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="content-tab">
                                    <div class="content-inner tab-content">
                                        <div class="form-sl">
                                            <form method="GET" action="{{ route('search.index') }}">
                                                <input type="hidden" name="is_immo" value="1">
                                                <input type="hidden" name="type" value="{{ $activeType }}">

                                                <div class="wd-find-select flex">
                                                    <div class="form-group-1 search-form form-style relative">
                                                        <i class="far fa-money"></i>
                                                        <input type="search" class="search-field" name="price_min" placeholder="Montant min:" />
                                                    </div>
                                                    <div class="form-group-1 search-form form-style relative">
                                                        <i class="far fa-money"></i>
                                                        <input type="search" class="search-field" placeholder="Montant max:"
                                                            value="" name="price_max" title="Search for" >
                                                    </div>

                                                    <div class="form-group-1 search-form form-style relative">
                                                        <input type="search" class="search-field" placeholder="Quartier"
                                                            value="" name="quartier" title="Search for" >
                                                    </div>

                                                        <div class="form-group-4 form-style">
                                                            <button type="submit">
                                                            <a class="icon-filter button-top pull-right" href="{{ route('search.index') }}">
                                                                <span>Filters</span>
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M3 10.5V0.75M3 10.5C3.39782 10.5 3.77936 10.658 4.06066 10.9393C4.34196 11.2206 4.5 11.6022 4.5 12C4.5 12.3978 4.34196 12.7794 4.06066 13.0607C3.77936 13.342 3.39782 13.5 3 13.5M3 10.5C2.60218 10.5 2.22064 10.658 1.93934 10.9393C1.65804 11.2206 1.5 11.6022 1.5 12C1.5 12.3978 1.65804 12.7794 1.93934 13.0607C2.22064 13.342 2.60218 13.5 3 13.5M3 17.25V13.5M15 10.5V0.75M15 10.5C15.3978 10.5 15.7794 10.658 16.0607 10.9393C16.342 11.2206 16.5 11.6022 16.5 12C16.5 12.3978 16.342 12.7794 16.0607 13.0607C15.7794 13.342 15.3978 13.5 15 13.5M15 10.5C14.6022 10.5 14.2206 10.658 13.9393 10.9393C13.658 11.2206 13.5 11.6022 13.5 12C13.5 12.3978 13.658 12.7794 13.9393 13.0607C14.2206 13.342 14.6022 13.5 15 13.5M15 17.25V13.5M9 4.5V0.75M9 4.5C9.39782 4.5 9.77936 4.65804 10.0607 4.93934C10.342 5.22064 10.5 5.60218 10.5 6C10.5 6.39782 10.342 6.77936 10.0607 7.06066C9.77936 7.34196 9.39782 7.5 9 7.5M9 4.5C8.60218 4.5 8.22064 4.65804 7.93934 4.93934C7.65804 5.22064 7.5 5.60218 7.5 6C7.5 6.39782 7.65804 6.77936 7.93934 7.06066C8.22064 7.34196 8.60218 7.5 9 7.5M9 17.25V7.5"
                                                                        stroke="#000" stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </a>
                                                            </button>
                                                        </div>



                                                    {{-- <div class="button-search sc-btn-top">
                                                        <a class="sc-button button-top" href="#">
                                                            <span>Search Now</span>
                                                            <i class="far fa-search"></i>
                                                        </a>
                                                    </div> --}}
                                                </div>

                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="flat-sale wg-dream tf-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">

                                        <div class="swiper-container2">
                                            <div class="vertical-list">
                                                @foreach ($posts as $post)
                                                    <div class="slide-item mb-4">
                                                        <div class="box box-dream hv-one">
                                                            <div class="image-group relative ">
                                                                <span class="featured fs-12 fw-6">
                                                                    @if ($post->type == 1)
                                                                        location
                                                                    @elseif ($post->type == 2)
                                                                        Vente
                                                                    @else
                                                                    Bail
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
                                                                                @if ($post?->photo)
                                                                                    <div class="swiper-slide">
                                                                                        <img src="{{ asset('storage/'.$post->photo) }}" alt="image principale" style="height: 300px; width: 100%; object-fit: cover;">
                                                                                    </div>
                                                                                @endif

                                                                                {{-- Autres photos --}}
                                                                                @foreach($post->photos as $photo)
                                                                                    <div class="swiper-slide">
                                                                                        <img src="{{ asset('storage'.$photo->path) }}" alt="image supplémentaire"
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
                </div>

            </div>
        </div>

    @elseif(request()->query('is_immo') == 2)

        <div class="top-filters">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-inner">
                            <div class="title-group fs-12"><a class="home fw-6 text-color-3"
                                    href="/">Automobile</a><span>Toutes les publications</span></div>
                        </div>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="flat-tabs style2 flex">
                                <div class="box-tab flex center">
                                    <ul class="menu-tab tab-title flex">
                                        <li class="title-item flex align-center box-tab {{ $activeType == 1 ? 'active' : '' }}">
                                            <a href="{{ route('all.posts', ['is_immo' => 2, 'type' => 1]) }}" class="flex align-center">
                                                <i class="far fa-check-circle"></i>
                                                <h4 class="inner">Location</h4>
                                            </a>
                                        </li>
                                        <li class="item-title flex align-center box-tab {{ $activeType == 2 ? 'active' : '' }}">
                                            <a href="{{ route('all.posts', ['is_immo' => 2, 'type' => 2]) }}" class="flex align-center">
                                                <i class="far fa-check-circle"></i>
                                                <h4 class="inner">Vente</h4>
                                            </a>
                                        </li>
                                        {{-- <li class="item-title flex align-center box-tab {{ $activeType == 3 ? 'active' : '' }}">
                                            <a href="{{ route('all.posts', ['is_immo' => 1, 'type' => 3]) }}" class="flex align-center">
                                                <i class="far fa-check-circle"></i>
                                                <h4 class="inner">Bail</h4>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>


                                <div class="content-tab">
                                    <div class="content-inner tab-content">
                                        <div class="form-sl">
                                            <form method="GET" action="{{ route('search.index') }}">
                                                <input type="hidden" name="is_immo" value="2">
                                                <input type="hidden" name="type" value="{{ $activeType }}">
                                                <div class="wd-find-select flex">
                                                    <div class="form-group-1 search-form form-style relative">
                                                        <i class="far fa-money"></i>
                                                        <input type="search" class="search-field" placeholder="montant min:"
                                                            value="" name="price_min" title="Search for" >
                                                    </div>
                                                    <div class="form-group-1 search-form form-style relative">
                                                        <i class="far fa-money"></i>
                                                        <input type="search" class="search-field" placeholder="montant max:"
                                                            value="" name="price_max" title="Search for" >
                                                    </div>
                                                    {{-- <div class="form-group-2 form-style">
                                                        <div class="group-select">
                                                            <div class="nice-select" tabindex="0"><span class="current">Property
                                                                    type</span>
                                                                <ul class="list">
                                                                    <li data-value class="option selected">Property type</li>
                                                                    <li data-value="bungalow" class="option">Bungalow</li>
                                                                    <li data-value="apartment" class="option">Apartment</li>
                                                                    <li data-value="house" class="option">House</li>
                                                                    <li data-value="smart-home" class="option">Smart Home</li>
                                                                    <li data-value="Single family home" class="option">Office</li>
                                                                    <li data-value="Multi family home" class="option">Villa</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-group-1 search-form form-style relative">
                                                        <input type="search" class="search-field" placeholder="Marque"
                                                            value="" name="marque" title="Search for" >
                                                    </div>
                                                    {{-- <div class="form-group-2 form-style">
                                                        <div class="group-select">
                                                            <div class="nice-select" tabindex="0"><span
                                                                    class="current">Baths</span>
                                                                <ul class="list">
                                                                    <li data-value class="option selected">Baths</li>
                                                                    <li data-value="floating" class="option">Floating baths</li>
                                                                    <li data-value="massage" class="option">Massage baths</li>
                                                                    <li data-value="floor-standing" class="option">Floor-standing
                                                                        bath</li>
                                                                    <li data-value="built-in" class="option">Built-in baths</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    {{-- <div class="form-group-3 form-style">
                                                        <div class="group-select">
                                                            <div class="nice-select" tabindex="0"><span
                                                                    class="current">Beds</span>
                                                                <ul class="list">
                                                                    <li data-value class="option selected">Beds</li>
                                                                    <li data-value="twin" class="option">Twin beds</li>
                                                                    <li data-value="bunk" class="option">Bunk beds</li>
                                                                    <li data-value="kids" class="option">Kids beds</li>
                                                                    <li data-value="single" class="option">Single bed</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-group-4 form-style">
                                                        <button type="submit">
                                                        <a class="icon-filter button-top pull-right" href="{{ route('search.index') }}">
                                                            <span>Filters</span>
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M3 10.5V0.75M3 10.5C3.39782 10.5 3.77936 10.658 4.06066 10.9393C4.34196 11.2206 4.5 11.6022 4.5 12C4.5 12.3978 4.34196 12.7794 4.06066 13.0607C3.77936 13.342 3.39782 13.5 3 13.5M3 10.5C2.60218 10.5 2.22064 10.658 1.93934 10.9393C1.65804 11.2206 1.5 11.6022 1.5 12C1.5 12.3978 1.65804 12.7794 1.93934 13.0607C2.22064 13.342 2.60218 13.5 3 13.5M3 17.25V13.5M15 10.5V0.75M15 10.5C15.3978 10.5 15.7794 10.658 16.0607 10.9393C16.342 11.2206 16.5 11.6022 16.5 12C16.5 12.3978 16.342 12.7794 16.0607 13.0607C15.7794 13.342 15.3978 13.5 15 13.5M15 10.5C14.6022 10.5 14.2206 10.658 13.9393 10.9393C13.658 11.2206 13.5 11.6022 13.5 12C13.5 12.3978 13.658 12.7794 13.9393 13.0607C14.2206 13.342 14.6022 13.5 15 13.5M15 17.25V13.5M9 4.5V0.75M9 4.5C9.39782 4.5 9.77936 4.65804 10.0607 4.93934C10.342 5.22064 10.5 5.60218 10.5 6C10.5 6.39782 10.342 6.77936 10.0607 7.06066C9.77936 7.34196 9.39782 7.5 9 7.5M9 4.5C8.60218 4.5 8.22064 4.65804 7.93934 4.93934C7.65804 5.22064 7.5 5.60218 7.5 6C7.5 6.39782 7.65804 6.77936 7.93934 7.06066C8.22064 7.34196 8.60218 7.5 9 7.5M9 17.25V7.5"
                                                                    stroke="#000" stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                        </button>
                                                    </div>
                                                    {{-- <div class="button-search sc-btn-top">
                                                        <a class="sc-button button-top" href="#">
                                                            <span>Search Now</span>
                                                            <i class="far fa-search"></i>
                                                        </a>
                                                    </div> --}}
                                                </div>

                                            </form>
                                            <!-- End Job  Search Form-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="flat-sale wg-dream tf-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">

                                        <div class="swiper-container2">
                                            <div class="vertical-list">
                                                @foreach ($posts as $post)
                                                    <div class="slide-item">
                                                        <div class="box box-dream hv-one">
                                                            <div class="image-group relative ">
                                                                <span class="featured fs-12 fw-6">
                                                                    @if ($post?->type == 1)
                                                                        Location
                                                                    @elseif ($post?->type == 2)
                                                                        Vente
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
                                                                                @if ($post?->photo)
                                                                                    <div class="swiper-slide">
                                                                                        <img src="{{ $post->photo?->first()->path }}" alt="image principale" style="height: 300px; width: 100%; object-fit: cover;">
                                                                                    </div>
                                                                                @endif

                                                                                {{-- Autres photos --}}
                                                                                @foreach($post->photos as $photo)
                                                                                    <div class="swiper-slide">
                                                                                        <img src="{{ $photo->path }}" alt="image supplémentaire"
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
                </div>


            </div>
        </div>



    @endif
    <script>
        function setActive(element) {
                // Retirer la classe active de tous les éléments
                const items = document.querySelectorAll('.menu-tab .box-tab');
                items.forEach(item => {
                    item.classList.remove('active');
                });

                // Ajouter la classe active à l'élément cliqué
                element.classList.add('active');
        }

    </script>

<script>
    function filterByType(type) {
        window.location.href = `is_immo=1?type=${type}`;
    }
</script>






@endsection
