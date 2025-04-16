@extends('layouts.website_layout')

@section('content')
<section class="flat-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-inner">
                    <div class="title-group fs-12">
                        <a class="home fw-6 text-color-3" href="/">Blog</a> <span>{{$post->title}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <article class="blog-post">
                    <h1>{{$post->title}}</h1>
                    <p class="text-muted">
                        Publié le {{ $post->created_at->format('d M Y') }} par
                        {{ optional($post->user)->first_name ?? optional($post->admin)->first_name }}
                    </p>

                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{$post->title}}" class="img-fluid mb-3">
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>
                </article>

                <!-- Boutons de partage -->
                <div class="share-buttons mt-4">
                    {{-- Bouton Like --}}
                    <button id="like-btn-{{ $post->id }}" onclick="likePost({{ $post->id }})" class="btn btn-primary me-2">
                        <i class="fa fa-heart"></i>
                        <span id="like-count-{{ $post->id }}">{{ $post->likes()->count() ?: 0 }}</span>
                    </button>

                    {{-- Facebook --}}
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                       target="_blank" class="btn btn-primary me-2" title="Partager sur Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    {{-- Twitter/X --}}
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                       target="_blank" class="btn btn-primary me-2" title="Partager sur X">
                        <i class="fab fa-x-twitter"></i> X
                    </a>

                    {{-- Partage natif navigateur (Web Share API) --}}
                    <button onclick="sharePost('{{ $post->title }}', '{{ url()->current() }}')"
                            class="btn btn-secondary" title="Partager">
                        <i class="fa fa-share-alt"></i> Partager
                    </button>
                </div>




                <!-- Bouton Like -->
                <div class="like-section mt-3">

                </div>

                <!-- Section Commentaires -->
                <div class="comments-section mt-5">
                    <h3>Commentaires</h3>
                    <ul class="list-group">
                        @foreach($post->comments as $comment)
                        <li class="list-group-item">
                            <strong>{{$comment->user?->first_name}}</strong> - {{$comment->created_at->diffForHumans()}}
                            <p>{{$comment->content}}</p>
                        </li>
                         @endforeach
                    </ul>
                </div>

                <!-- Formulaire Commentaire -->
                <div class="comment-form mt-4">
                    <h4>Laisser un commentaire</h4>
                    <form action="{{ route('comments.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="6" placeholder="Votre commentaire..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function sharePost(title, url) {
        if (navigator.share) {
            navigator.share({
                title: title,
                url: url
            }).then(() => {
                console.log('Contenu partagé avec succès');
            }).catch(error => {
                console.error('Erreur de partage :', error);
            });
        } else {
            // Si le navigateur ne supporte pas navigator.share
            alert("Le partage automatique n'est pas pris en charge sur ce navigateur.");
        }
    }
</script>

@endsection
