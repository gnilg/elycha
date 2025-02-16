@extends('layouts.dashboard_layout')
@section('content')
    <section class="flat-title2">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-group fs-30 lh-45 fw-7">Mettre à jour mon mot de passe</div>
                </div>
            </div>
        </div>
    </section>
    <section class="flat-profile flat-upload-photo">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <form action="/user/update-password" method="post">
                        @csrf
                        <div class="tf-infomation bg-white">
                            <br>
                            <div class="info-box info-wg">
                                <div class="inner-1">
                                    <fieldset>
                                        <label class="title-user fw-6">Mot de passe actuel</label>
                                        <input type="password" placeholder="********" class="input-form" name="c_password" required>
                                    </fieldset>
                                </div>
                                <div class="inner-1">
                                    <fieldset>
                                        <label class="title-user fw-6">Nouveau mot de passe</label>
                                        <input type="password" placeholder="********" class="input-form" name="n_password" required>
                                    </fieldset>
                                </div>
                                <div class="inner-1">
                                    <fieldset>
                                        <label class="title-user fw-6">Confirmation</label>
                                        <input type="password" placeholder="********" class="input-form" name="cn_password" required>
                                    </fieldset>
                                </div>
                                <div class="wrap-button tf-save text-center">
                                    <button class="sc-button" name="submit" type="submit">
                                        <span>MODIFIER</span>
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
