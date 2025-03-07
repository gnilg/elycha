<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Elycha | Accueil</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href={{asset('assets/front/app/dist/font-awesome.css')}}>
    <link rel="stylesheet" href={{asset('assets/front/app/dist/app.css')}}>
    <link rel="stylesheet" href={{asset('assets/front/app/dist/responsive.css')}}>
    <link rel="stylesheet" href={{asset('assets/front/app/dist/owl.css')}}>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href={{asset('assets/front/assets/images/logo/Favicon.png')}}>
    <link rel="apple-touch-icon-precomposed" href={{asset('assets/front/assets/images/logo/Favicon.png')}}>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



</head>

<body class="body">

    <style>
        .text-custom {
    font-family: 'Poppins', sans-serif;
    }
    .app-buttons {
                    display: flex;
                    justify-content: center;
                    gap: 15px;
                    margin-top: 20px;
                }

                .store-badge {
                    height: 50px;
                    transition: transform 0.2s ease-in-out;
                }

                .store-badge:hover {
                    transform: scale(1.1);
                }

                .icon-socials {
    display: flex;
    align-items: center;
    gap: 10px;
}

.social-link {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #f1f1f1;
    color: #333;
    font-size: 18px;
    transition: all 0.3s ease-in-out;
}

.social-link:hover {
    background: #007bff; /* Bleu pour un effet cool */
    color: rgb(70, 48, 48);
}


    </style>
    @if (Session::has('flash_message_error'))
        <script type="text/javascript" src="{{ asset('sweetalert.min.js') }}"></script>
        <script type="text/javascript">
            swal("{{ session('flash_message_error') }}", "Merci", "error");
        </script>
    @endif
    @if (Session::has('flash_message_success'))
        <script type="text/javascript" src="{{ asset('sweetalert.min.js') }}"></script>
        <script type="text/javascript">
            swal("{{ session('flash_message_success') }}", "Merci", "success");
        </script>
    @endif

    <!--<div class="preload preload-container">
        <div class="boxes ">
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>-->

    <!-- /preload -->

    @yield('content')
    <!-- /#wrapper -->

    <!-- Modal Popup Bid pour Inscription et connexion


    -->

    <!-- inscription et connexion section -->

    <div class="modal fade popup" id="popup_bid" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body space-y-20 pd-40">
                    <div class="wrap-modal flex">
                        <div class="images flex-none">
                            <img src="/front/assets/images/section/bg-login.jpg" alt="images">
                            <div class="mark-logo">
                                <img src="/front/assets/images/logo/logo2.png" alt="images">
                            </div>
                        </div>
                        <div class="content">
                            <div class="title-login fs-30 fw-7 lh-45">Connexion</div>
                            <div class="comments">
                                <div class="respond-comment">
                                    <form method="post" class="comment-form" action="/auth/login">
                                        @csrf
                                        <fieldset class="">
                                            <label class="fw-6">Numéro de téléphone</label>
                                            <input type="tel" id="telephone" class="tb-my-input" name="telephone"
                                                placeholder="Ex: +22893554740" required>
                                            <img class="img-icon img-email"
                                                src="/front/assets/images/icon/icon-gmail.svg" alt="images">
                                        </fieldset>
                                        <fieldset class="style-wrap">
                                            <label class="fw-6">Mot de passe</label>
                                            <input type="password" name="password" class="input-form password-input"
                                                placeholder="*********" required>
                                            <img class="img-icon" src="/front/assets/images/icon/icon-password.svg"
                                                alt="images">
                                        </fieldset>
                                        {{-- <div class="title-forgot"><a class="fs-13">Mot de passe oublié?</a> </div> --}}
                                        <button class="sc-button" name="submit" type="submit">
                                            <span>SE CONNECTER</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="text-box text-center fs-13">Vous n'avez pas de compte? <a
                                    class="font-2 fw-7 fs-13 color-popup text-color-3" data-toggle="modal"
                                    data-target="#popup_bid2" data-dismiss="modal" aria-label="Close">Créer un compte
                                    maintenant</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade popup " id="popup_bid2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body space-y-20 pd-40 style2">
                    <div class="wrap-modal flex">
                        <div class="images flex-none relative">
                            <img src="/front/assets/images/section/bg-register.jpg" alt="images">
                            <div class="mark-logo">
                                <img src="/front/assets/images/logo/logo2.png" alt="images">
                            </div>
                        </div>
                        <div class="content">
                            <div class="title-login fs-30 fw-7 lh-45">Inscription</div>
                            <div class="comments">
                                <div class="respond-comment">
                                    <form method="post" class="comment-form" action="/auth/register">
                                        @csrf
                                        <input type="hidden" id="type_user" name="type_user" value="1">
                                        <fieldset class="">
                                            <label class="fw-6">Nom</label>
                                            <input type="text" class="tb-my-input" name="last_name"
                                                placeholder="Ex: DOE" required>
                                            <img class="img-icon img-name"
                                                src="/front/assets/images/icon/login-user.svg" alt="images">
                                        </fieldset>
                                        <fieldset class="">
                                            <label class="fw-6">Prénoms</label>
                                            <input type="text" class="tb-my-input" name="first_name"
                                                placeholder="Ex: John" required>
                                            <img class="img-icon img-name"
                                                src="/front/assets/images/icon/login-user.svg" alt="images">
                                        </fieldset>
                                        <fieldset class="t">
                                            <label class="fw-6">Numéro de téléphone</label>
                                            <input type="tel" class="tb-my-input" name="telephone"
                                                placeholder="Ex: +22893554740" required>
                                            <img class="img-icon" src="/front/assets/images/icon/icon-gmail.svg"
                                                alt="images">
                                        </fieldset>
                                        <fieldset class="">
                                            <label class="fw-6">Mot de passe</label>
                                            <input type="password" name="password" class="input-form password-input"
                                                placeholder="**********" required>
                                            <img class="img-icon" src="/front/assets/images/icon/icon-password.svg"
                                                alt="images">
                                        </fieldset>
                                        <fieldset class="">
                                            <label class="fw-6">Type de compte</label>
                                            <div class="form-group-2 form-style">
                                                <div class="group-select">
                                                    <div class="nice-select" tabindex="0"><span
                                                            class="current">Choisir</span>
                                                        <ul class="list">
                                                            <li data-value class="option selected"
                                                                onclick="document.getElementById('type_user').value = 1">
                                                                Client</li>
                                                            <li data-value="bungalow" class="option"
                                                                onclick="document.getElementById('type_user').value = 2">
                                                                Agent</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="img-icon" src="/front/assets/images/icon/icon-password.svg"
                                                alt="images">
                                        </fieldset>
                                        <button class="sc-button" name="submit" type="submit">
                                            <span>S'INSCRIRE</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="text-box text-center fs-13">Avez-vous déjà un compte ? <a
                                    class="font-2 fw-7 fs-13 color-popup text-color-3" data-toggle="modal"
                                    data-target="#popup_bid" data-dismiss="modal"
                                    aria-label="Close">Connectez-vous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End  inscription et connexion section -->

    <a id="scroll-top" class="button-go"></a>

    <!-- Javascript -->

    <script data-cfasync="false" src="https://themesflat.co/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
    </script>
    <script src={{asset('assets/front/app/js/jquery.min.js')}}></script>
    <script src={{asset('assets/front/app/js/jquery.easing.js')}}></script>
    <script src={{asset('assets/front/app/js/jquery.nice-select.min.js')}}></script>
    <script src={{asset('assets/front/app/js/bootstrap.min.js')}}></script>
    <script src={{asset('assets/front/app/js/owl.js')}}></script>
    <script src={{asset('assets/front/app/js/swiper-bundle.min.js')}}></script>
    <script src={{asset('assets/front/app/js/swiper.js')}}></script>

    <script src={{asset('assets/front/app/js/jquery.fancybox.js')}}></script>
    <script src={{asset('assets/front/app/js/plugin.js')}}></script>
    <script src={{asset('assets/front/app/js/shortcodes.js')}}></script>
    <script src={{asset('assets/front/app/js/main.js')}}></script>
    <script src={{asset('assets/front/app/js/curved.js')}}></script>
    <script src={{asset('assets/front/app/js/price-ranger.js')}}></script>

</body>

</html>
