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
            <div class="col-lg-8">
                <article class="blog-post">
                    <h1>{{$post->title}}</h1>
                    <p class="text-muted">Publié le {{$post->created_at->format('d M Y')}} par {{$post->author?->name}}</p>
                    <img src="{{$post->image}}" alt="{{$post->title}}" class="img-fluid mb-3">
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>
                </article>

                <!-- Boutons de partage -->
                <div class="share-buttons mt-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank" class="btn btn-primary">Partager sur Facebook</a>
                    <a href="https://twitter.com/intent/tweet?url={{url()->current()}}&text={{$post->title}}" target="_blank" class="btn btn-info">Partager sur Twitter</a>
                </div>

                <!-- Bouton Like -->
                <div class="like-section mt-3">
                    <form action="{{ route('likes.toggle', $post->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-primary" onclick="likePost({{ $post->id }})">
                            ❤️  (<span id="like-count-{{ $post->id }}">{{ $post->likes_count ?? 0 }}</span>)
                        </button>
                    </form>
                </div>

                <!-- Section Commentaires -->
                <div class="comments-section mt-5">
                    <h3>Commentaires</h3>
                    <ul class="list-group">
                        {{-- @foreach($post->comments as $comment) --}}
                        {{-- <li class="list-group-item">
                            <strong>{{$comment?->user->name}}</strong> - {{$comment->created_at->diffForHumans()}}
                            <p>{{$comment->content}}</p>
                        </li> --}}
                        {{-- @endforeach --}}
                    </ul>
                </div>

                <!-- Formulaire Commentaire -->
                <div class="comment-form mt-4">
                    <h4>Laisser un commentaire</h4>
                    <form action="{{ route('comments.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="4" placeholder="Votre commentaire..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
