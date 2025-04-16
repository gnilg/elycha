@extends('layouts.dashboard_layout')
@section('content')
    <section class="flat-title2 ">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-group fs-30 lh-45 fw-7">Mon compte</div>
                </div>
            </div>
        </div>
    </section>
    <section class="flat-profile flat-upload-photo">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <form action="/user/profile" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="tf-uploads bg-white">
                            <h3 class="titles">Avatar</h3>

                            <div class="wrap-upload ">
                                <div class="box-upload flex">
                                    <div class="img-up relative">
                                        <img class="avatar" id="profileimg" src="{{ auth()->user()->avatar }}"
                                            alt="">
                                    </div>
                                    <div class="content">
                                        <div class="subtitle">Téléverser une photo”</div>
                                        <div class="button-box relative flex align-center" id="upload-profile">
                                            <a href="#" class="btn-upload sc-button">
                                                <span class="fw-14 fw-6">Choisir un fichier</span> </a>
                                            <input id="tf-upload-img" type="file" name="avatar">
                                        </div>
                                        <p class="fs-12 lh-18">JPEG/PNG 300x300</p>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tf-infomation bg-white">
                            <h3 class="titles">Infomations</h3>
                            <div class="info-box info-wg">
                                <div class="inner-1">
                                    <fieldset>
                                        <label class="title-user fw-6">Nom</label>
                                        <input type="text" placeholder="Ex: DOE" value="{{ auth()->user()->last_name }}"
                                            class="input-form" name="last_name" required>
                                    </fieldset>
                                </div>
                                <div class="inner-1">
                                    <fieldset>
                                        <label class="title-user fw-6">Prénoms</label>
                                        <input type="text" placeholder="Ex: John"
                                            value="{{ auth()->user()->first_name }}" name="first_name" class="input-form" required>
                                    </fieldset>
                                </div>
                                <div class="inner-3 inner form-wg flex ">
                                    <div class="wg-box select-group">
                                        <fieldset>
                                            <label class="title-user fw-6">Adresse mail</label>
                                            <input type="email" placeholder="Ex: test@gmail.com"
                                                value="{{ auth()->user()->email }}" name="email" class="input-form">
                                        </fieldset>
                                    </div>
                                    <div class="wg-box select-group">
                                        <fieldset>
                                            <label class="title-user fw-6">Téléphone</label>
                                            <input type="tel" placeholder="Ex: +22893554740"
                                                value="{{ auth()->user()->telephone }}" name="telephone" class="input-form" required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="wrap-button tf-save text-center">
                                    <button class="sc-button" name="submit" type="submit">
                                        <span>Mettre à jour</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
