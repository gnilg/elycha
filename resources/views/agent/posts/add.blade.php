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
                                    <div class="button-box relative" id="upload-profile">
                                        <a href="#" class="btn-upload sc-button">
                                            <span>Choisir des photos</span>
                                        </a>
                                        <input id="tf-upload-img" type="file" name="photos[]" multiple required accept="image/*" style="position:absolute;top:0;left:0;width:100%;height:100%;opacity:0;cursor:pointer;">
                                    </div>
                                </div>
                            </div>
                            <!-- Prévisualisation -->
                            <div id="preview-container" style="margin-top: 15px; display: flex; gap: 10px; flex-wrap: wrap;"></div>
                        </div>

                        <div class="tf-infomation bg-white">
                            <h3 class="titles">Informations</h3>
                            <div class="info-box info-wg">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="inner-1">
                                            <div class="wg-box2 select-group">
                                                <fieldset>
                                                    <label class="title-user fw-6">Titre de la publication</label>
                                                    <input type="text" placeholder="Ex: Villa" name="label"
                                                        class="input-form" required>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="inner-1">
                                            <div class="wg-box2 select-group">
                                                <fieldset>
                                                    <label class="title-user fw-6">Lieu</label>
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


                                <div class="inner-1">
                                    <div class="wg-box2 select-group">
                                        <fieldset>
                                            <label class="title-user fw-6">Prix(En Fcfa)</label>
                                            <input type="number" placeholder="Ex: 10000" name="price" class="input-form"
                                                required>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tf-rent tf-infomation bg-white">
                            <h3 class="titles">Catégorie</h3>
                            <div class="info-box info-wg">
                                <div class="inner-1">
                                    <div class="wg-box2 select-group">
                                        <label class="title-user fw-6">Type</label>
                                        <div class="row justify-content-center">
                                            <button type="button" class="btn btn-black col-lg-5"
                                                onclick="chooseCategory(1)" id="immoBtn"
                                                style="margin-left:5px;margin-right:5px;margin-bottom:5px">Immobilier</button>
                                            <button type="button" class="btn btn-black col-lg-5"
                                                onclick="chooseCategory(2)" id="autoBtn"
                                                style="margin-left:5px;margin-right:5px;margin-bottom:5px">Automobile
                                            </button>


                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <input type="hidden" name="type" id="type" value="">

                                    <button type="button" class="btn btn-black col-lg-3" onclick="chooseType(1,this)"
                                        style="margin-left:5px;margin-right:5px;margin-bottom:5px">Location</button>
                                    <button type="button" class="btn btn-black col-lg-3" onclick="chooseType(2,this)"
                                        style="margin-left:5px;margin-right:5px;margin-bottom:5px">Vente</button>
                                    <button type="button" class="btn btn-black col-lg-3" id="otherType"
                                        onclick="chooseType(3,this)"
                                        style="margin-left:5px;margin-right:5px;margin-bottom:5px">Bail</button>
                                </div>
                                <br>
                                {{-- <div class="inner-1">
                                    <div class="wg-box2 select-group">
                                        <label class="title-user fw-6">Sous-catégorie</label>
                                        <div class="nice-select" tabindex="0">
                                            <span class="current">Choisir</span>
                                            <ul class="list" id="items-list">
                                                <li data-value class="option selected">Choisir</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
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
    // Choix de catégorie (immobilier ou automobile)
    let category = 1;

    function chooseCategory(type) {
        category = type;
        document.getElementById('category').value = type; // ← ici on met à jour le champ caché

        if (type == 1) {
            document.getElementById('immoBtn').classList.add("bg-primary");
            document.getElementById('autoBtn').classList.remove("bg-primary");
            document.getElementById('otherType').innerHTML = "Bail";
        } else {
            document.getElementById('immoBtn').classList.remove("bg-primary");
            document.getElementById('autoBtn').classList.add("bg-primary");
            document.getElementById('otherType').innerHTML = ""; // ou cache le bouton bail si tu veux
        }
    }


    function chooseType(type, self) {
    try {
        const items = document.getElementsByClassName('primary-background');
        items[0].classList.remove("primary-background");
    } catch (error) {}
    self.classList.add("primary-background");

    document.getElementById('type').value = type; // ← important
}


    // Preview des images sélectionnées
    document.getElementById('tf-upload-img').addEventListener('change', function(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('preview-container');
        previewContainer.innerHTML = ''; // reset avant de prévisualiser

        Array.from(files).forEach(file => {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover';
                    img.classList.add('rounded');
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // Sélection par défaut
    chooseCategory(1);
</script>
@endsection
