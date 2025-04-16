@extends('layouts.dashboard_layout')

@section('content')
    <section class="flat-title2">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-group fs-30 lh-45 fw-7">Ajouter une publication1</div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-upload-photo">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <form action="/architecte/posts/add" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="tf-upload">
                            <h3 class="titles">Vidéo principale</h3>
                            <div class="wrap-upload center">
                                <div class="box-upload">
                                    <div class="video-up relative">
                                        <video id="videoPreview" width="300" controls style="display: none;"></video>
                                    </div>
                                    <div class="button-box relative">
                                        <label class="btn-upload sc-button">
                                            <span>Choisir une vidéo</span>
                                            <input id="tf-upload-video" type="file" name="video" accept="video/*" required hidden>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tf-infomation bg-white">
                            <h3 class="titles">Informations</h3>
                            <div class="info-box info-wg">
                                <div class="inner-1">
                                    <div class="wg-box2 select-group">
                                        <fieldset>
                                            <label class="title-user fw-6">Titre de la publication</label>
                                            <input type="text" placeholder="Ex: Super vidéo" name="title"
                                                class="input-form" required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="inner-1">
                                    <div class="wg-box2 select-group">
                                        <fieldset>
                                            <label class="title-user fw-6">Description</label>
                                            <textarea placeholder="Décrivez votre vidéo..." name="description" required
                                                class="input-form bg-white"
                                                style="color:black;border:1px solid silver;" rows="4"></textarea>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tf-save">
                            <div class="wrap-button flex justify-center">
                                <button class="sc-button" name="submit" type="submit">
                                    <span>PUBLIER</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.getElementById("tf-upload-video").addEventListener("change", function(event) {
            let file = event.target.files[0];
            let videoPreview = document.getElementById("videoPreview");

            if (file) {
                let fileType = file.type;

                // Vérifier si c'est bien une vidéo
                if (!fileType.startsWith("video/")) {
                    alert("Veuillez sélectionner un fichier vidéo valide.");
                    event.target.value = ""; // Réinitialiser le champ
                    return;
                }

                let fileURL = URL.createObjectURL(file);
                videoPreview.src = fileURL;
                videoPreview.style.display = "block"; // Afficher la vidéo
            }
        });
    </script>
@endsection
