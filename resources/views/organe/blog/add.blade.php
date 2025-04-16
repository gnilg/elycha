@extends('layouts.dashboard_layout')
@section('content')
    <section class="flat-title2 ">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-group fs-30 lh-45 fw-7">Ajouter  un nouvel article</div>
                </div>
            </div>
        </div>
    </section>
    <section class="flat-upload-photo">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tf-rent tf-infomation bg-white">

                    <form   id="uploadForm" action="/organe/posts/blog/add" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="inner-1">
                            <div class="wg-box2 select-group">
                                <fieldset>
                                    <label class="title-user fw-6">Titre</label>
                                    <input type="text"  name="title" class="input-form"  required>
                                </fieldset>
                            </div>
                        </div>



                        <div class="mb-3">
                            <label for="content" class="form-label">Contenu</label>
                            <textarea name="content" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="tf-upload">
                            <h3 class="titles">Photo principale</h3>
                            <div class="wrap-upload center">
                                <div class="box-upload">
                                    <div class="img-up relative">
                                        <img class="avatar rounded" style="width: 100px" id="profileimg"
                                            src="/front/assets/images/icon/icon-upload.png" alt="">
                                    </div>
                                    <div class="button-box relative" id="upload-profile">
                                        <a href="#" class="btn-upload sc-button">
                                            <span>Choisir une photo</span> </a>
                                        <input id="tf-upload-img" type="file" name="image" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tf-save">
                            <div class="wrap-button flex justify">
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
    document.getElementById('uploadForm').addEventListener('submit', function (e) {
        const fileInput = document.getElementById('tf-upload-img');
        const file = fileInput.files[0];

        if (file && file.size > 6 * 1024 * 1024) { // 6 Mo
            e.preventDefault();
            alert('Fichier trop volumineux. Maximum autorisé : 6 Mo.');
        }
    });
</script>
@endsection

