@extends('layouts.website_layout')
@section('content')
<section class="flat-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-inner">
                    <div class="title-group fs-12"><a class="home fw-6 text-color-3"
                            href="/">Blog</a><span>Toutes les publications</span></div>
                </div>
            </div>

                <!-- Page header with logo and tagline-->

                <!-- Page content-->

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" >
                            <div class="swiper-container2">
                                <div class="vertical-list">
                                    @foreach ($blogPosts as $post)
                                    <div class="slide-item">
                                        <div class="box box-dream hv-one">
                                            <a href="{{ route('blog.show', $post->id) }}"><img class="card-img-top" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" />
                                            </a>
                                            <div class="card-body" style="padding: 4px ">
                                                <div class="small text-muted">{{ $post->created_at->format('F d, Y') }}</div>
                                                <h2 class="card-title h4">{{ $post->title }}</h2>
                                                <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                                                <div style="padding-left: 4px; padding-right: 30px">
                                                    <a class="btn btn-warning" href="{{ route('blog.show', $post->id) }}">Lire plus →</a>

                                                    <!-- Bouton J'aime -->
                                                    <button class="btn btn-outline-primary" onclick="likePost({{ $post->id }})" id="like-btn-{{ $post->id }}">
                                                        ❤️ (<span id="like-count-{{ $post->id }}">{{ $post->likes->count() }}</span>)
                                                    </button>


                                                    <!-- Bouton Commentaire -->
                                                    <a class="btn btn-outline-secondary" href="{{ route('blog.show', $post->id) }}#comments">
                                                        💬
                                                    </a>

                                                    <!-- Bouton Partage -->

                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>

                            </div>


                            <!-- Featured blog post-->



                        </div>

                        <!-- Side widgets-->

                            <!-- Categories widget-->

                            <!-- Side widget-->

                        </div>
                    </div>
                </div>





            {{-- <div class="col d-flex pb-2 gap-3 justify-content-center mb-4">
                <div class="col-md-4">
                    <button class="btn button btn-warning w-100" onclick="filterResults()">Location</button>
                </div>
                <div class="col-md-4">
                    <button class="btn button btn-warning w-100" onclick="filterResults()">Vente</button>
                </div>
                <div class="col-md-4">
                    <button class="btn button btn-warning w-100" onclick="filterResults()">Bail</button>
                </div>
            </div> --}}

            {{-- <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Contact</button>
                </li>
              </ul> --}}


        </div>

    </div>

</section>
@endsection