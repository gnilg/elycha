@extends('layouts.dashboard_layout')
@section('content')
    <section class="flat-title2 ">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-group fs-30 lh-45 fw-7">
                        Mes publications
                        <a class="sc-button" href="/organe/posts/blog/add"
                            style="float: right;padding:0px;padding-left:10px;padding-right:10px">
                            <span>Ajouter +</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="flat-counter">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrap-count flex-wrap flex justify-content-center">


                    </div>

                </div>
                <div class="col-lg-3">

                </div>

            </div>
        </div>
    </section>

    <section class="flat-dashboard">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12 flex post-col">

                    <div class="tf-new-listing w-100">
                        <div class="new-listing bg-white">
                            <h3 class="titles">Mes publications</h3>


                            {{-- <div class="wrap-form wd-find-select date-wgs flex">
                                <div class="form-group-1 search-form form-style relative">
                                    <i class="far fa-search"></i>
                                    <input type="search" class="search-field" placeholder="Rechercher..." value=""
                                        name="s" title="Rechercher" required="">
                                </div>
                                <div class="form-group-2 form-style relative">
                                    <input type="date" class="date-wg" name="date" value="" required="">
                                    <p class="p-date">De</p>
                                </div>
                                <div class="form-group-3 form-style relative">
                                    <input type="date" class="date-wg" name="date" value="" required="">
                                    <p class="p-date">À</p>
                                </div>
                                <div class="form-group-4">
                                    <div class="group-select">
                                        <div class="nice-select" tabindex="0"><span class="current">Status</span>
                                            <ul class="list style">
                                                <li data-value class="option selected">Status</li>
                                                <li data-value="live" class="option">En cours</li>
                                                <li data-value="classed" class="option ">Classé</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="sub-text fs-12 lh-18 "><span class="one font-2 fw-7">{{ $posts->count() }}</span>
                                <span>resultat(s)</span>
                            </div>
                            <div class="table-content">
                                <div class="wrap-listing table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="fw-6">Publication</th>
                                                <th class="fw-6">Titre</th>
                                                <th class="fw-6">Date</th>
                                                <th class="fw-6">Nombre de Vues</th>
                                                <th class="fw-6">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr class="file-delete">
                                                    <td>
                                                        <div class="images">
                                                            <img src="{{ asset('storage/' . $post->image) }}" class="rounded"
                                                                style="width: 100px" alt="images">
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="status-wrap">
                                                            {{ $post->title}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="candidates-wrap flex">

                                                            <div class="content">
                                                                <h4 class="link-style-1"><a
                                                                        href="property-detail-v1.html">{{ $post->label }}</a>
                                                                </h4>
                                                                <div class="text-date">
                                                                    <p class="p-12 text-color-2 lh-18">Publié le:
                                                                        {{ formatDate($post->created_at) }}</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>

                                                        {{ $post->views }}
                                                    </td>
                                                    <td>
                                                        <div class="icon-wrap">
                                                            <ul class="">
                                                                <div class="actions d-flex gap-2">
                                                                <li class=""><a class="fw-6"><i
                                                                            class="far fa-pen"></i></a>
                                                                </li>
                                                                <li class=""><a href="{{ route('blog.show', $post->id)}}" class="fw-6"><i
                                                                            class="fal fa-eye"></i></a>
                                                                </li>
                                                                <li class=""><a class="remove-file fw-6"><i
                                                                            class="fal fa-trash-alt"></i></a>
                                                                </li>
                                                                </div>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
