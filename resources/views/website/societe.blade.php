@extends('layouts.website_layout')
@section('content')

<section class="flat-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-inner">
                    <div class="title-group fs-12"><a class="home fw-6 text-color-3"
                            href="/">Services</a><span>Toutes les publications</span></div>
                </div>

            </div>

            <div>
                <!-- Page header with logo and tagline-->

                <!-- Page content-->
                <div class="container">
                    <div class="row">
                        <!-- Blog entries-->
                        @foreach ($societePosts as $post)
                        <div class="col-lg-8" style="padding-bottom: 30px;">
                            <!-- Featured blog post-->

                            <div class="card mb-4">
                                <a href="{{ route('blog.show', $post->id) }}"><img class="card-img-top" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" />
                                </a>
                                <div class="card-body" style="padding: 4px">
                                    <div class="small text-muted">{{ $post->created_at->format('F d, Y') }}</div>
                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                                    <div style="padding-left: 4px; padding-right: 30px">
                                        <a class="btn btn-warning" href="{{ route('blog.show', $post->id) }}">Lire plus →</a>

                                        <!-- Bouton J'aime -->
                                        <button class="btn btn-outline-primary" onclick="likePost({{ $post->id }})">
                                            ❤️  (<span id="like-count-{{ $post->id }}">{{ $post->likes_count ?? 0 }}</span>)
                                        </button>

                                        <!-- Bouton Commentaire -->
                                        <a class="btn btn-outline-secondary" href="{{ route('blog.show', $post->id) }}#comments">
                                            💬
                                        </a>

                                        <!-- Bouton Partage -->
                                        <button class="btn btn-outline-success" onclick="sharePost({{ $post->id }})">
                                            🔗
                                        </button>
                                    </div>


                                </div>
                            </div>

                        </div>
                        @endforeach
                        <!-- Side widgets-->

                            <!-- Categories widget-->

                            <!-- Side widget-->

                        </div>
                    </div>
                </div>
            </div>





        </div>

    </div>

</section>

@endsection