@extends('layouts.dashboard_layout')
@section('content')
    <section class="flat-title2 ">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-group fs-30 lh-45 fw-7">Ajouter une publication</div>
                </div>
            </div>
        </div>
    </section>
    <section class="flat-upload-photo">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <form action="/agent/posts/add" method="post" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="category" id="category" value="0">
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
                                        <input id="tf-upload-img" type="file" name="photo" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tf-infomation bg-white">
                            <h3 class="titles">Informations</h3>
                            <div class="info-box info-wg">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="inner-1">
                                            <div class="wg-box2 select-group">
                                                <fieldset>
                                                    <label class="title-user fw-6">Titre du service</label>
                                                    <input type="text" placeholder="Ex: plomberie , " name="label"
                                                        class="input-form" required>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="inner-1">
                                            <div class="wg-box2 select-group">
                                                <fieldset>
                                                    <label class="title-user fw-6">Localisation</label>
                                                    <input type="text" placeholder="Ex: Agoè cacaveli" name="place"
                                                        class="input-form" required>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="inner-1">
                                    <div class="wg-box2 select-group">
                                        <fieldset>
                                            <label class="title-user fw-6">Description</label>
                                            <textarea placeholder="Ex: Il s'agit d'une publication..." name="description" required class="input-form bg-white"
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
        category = 1;

        function chooseCategory(type) {
            category = type;
            if (type == 1) {
                document.getElementById('immoBtn').classList.add("bg-primary");
                document.getElementById('autoBtn').classList.remove("bg-primary");
                document.getElementById('otherType').innerHTML = "Bail";
            }
             else {
                document.getElementById('immoBtn').classList.remove("bg-primary");
                document.getElementById('autoBtn').classList.add("bg-primary");
                document.getElementById('otherType').innerHTML = "Vente de pièces";
            }
        }

        function chooseType(type, self) {

            try {
                var items = document.getElementsByClassName('primary-background');
                items[0].classList.remove("primary-background")
            } catch (error) {}
            self.classList.add("primary-background");
            getSubCategories(type);


        }

        function getSubCategories(id) {
            document.getElementById("items-list").innerHTML = '<li data-value class="option selected">Choisir</li>';

            $.get("/api/categories/" + id + "/" + category, function(data, status) {
                data.forEach(element => {
                    document.getElementById("items-list").innerHTML +=
                        "<li class='option' onclick='setData(" + element.id + ")' data-value='" + element
                        .id + "'>" + element.label +
                        "</li>";
                });
            });
        }

        function setData(id) {
            document.getElementById('category').value = id;
        }
        chooseCategory(1);
    </script>
@endsection
