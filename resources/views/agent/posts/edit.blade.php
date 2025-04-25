@extends('layouts.dashboard_layout')

@section('content')
<section class="flat-title2">
    <div class="container7">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-group fs-30 lh-45 fw-7">Modifier la publication</div>
            </div>
        </div>
    </div>
</section>

<section class="flat-upload-photo">
    <div class="container7">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('posts.update', $publication->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="category" id="category" value="{{ old('category', $publication->category) }}">

                    <div class="tf-upload">
                        <h3 class="titles">Photo principale</h3>
                        <div class="wrap-upload center">
                            <div class="box-upload">
                                <div class="button-box relative" id="upload-profile">
                                    <a href="#" class="btn-upload sc-button">
                                        <span>Choisir des photos</span>
                                    </a>
                                    <input id="tf-upload-img" type="file" name="photos[]" multiple accept="image/*"
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;opacity:0;cursor:pointer;">
                                </div>
                            </div>
                        </div>
                        <!-- Prévisualisation -->
                        <div id="preview-container" style="margin-top: 15px; display: flex; gap: 10px; flex-wrap: wrap;">
                            @foreach($publication->media ?? [] as $media)
                                <img src="{{ asset('storage/'.$media) }}" width="100" height="100" class="rounded" style="object-fit: cover;">
                            @endforeach
                        </div>
                    </div>

                    <div class="tf-infomation bg-white">
                        <h3 class="titles">Informations</h3>
                        <div class="info-box info-wg">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="inner-1">
                                        <fieldset>
                                            <label class="title-user fw-6">Titre de la publication</label>
                                            <input type="text" name="label" value="{{ old('label', $publication->label) }}"
                                                class="input-form" required placeholder="Ex: Villa">
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="inner-1">
                                        <fieldset>
                                            <label class="title-user fw-6">Lieu</label>
                                            <input type="text" name="place" value="{{ old('place', $publication->place) }}"
                                                class="input-form" required placeholder="Ex: Agoè cacaveli">
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <div class="inner-1">
                                <fieldset>
                                    <label class="title-user fw-6">Description</label>
                                    <textarea name="description" rows="4" required class="input-form bg-white"
                                        style="color:black;border:1px solid silver;" placeholder="Ex: Il s'agit d'une publication...">{{ old('description', $publication->description) }}</textarea>
                                </fieldset>
                            </div>

                            <div class="inner-1">
                                <fieldset>
                                    <label class="title-user fw-6">Prix (En Fcfa)</label>
                                    <input type="number" name="price" value="{{ old('price', $publication->price) }}"
                                        class="input-form" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="tf-rent tf-infomation bg-white">
                        <h3 class="titles">Catégorie</h3>
                        <div class="info-box info-wg">
                            <div class="inner-1">
                                <label class="title-user fw-6">Type</label>
                                <div class="row justify-content-center">
                                    <button type="button" class="btn btn-black col-lg-5" onclick="chooseCategory(1)" id="immoBtn">Immobilier</button>
                                    <button type="button" class="btn btn-black col-lg-5" onclick="chooseCategory(2)" id="autoBtn">Automobile</button>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-3">
                                <input type="hidden" name="type" id="type" value="{{ old('type', $publication->type) }}">
                                <button type="button" class="btn btn-black col-lg-3" onclick="chooseType(1, this)">Location</button>
                                <button type="button" class="btn btn-black col-lg-3" onclick="chooseType(2, this)">Vente</button>
                                <button type="button" class="btn btn-black col-lg-3" onclick="chooseType(3, this)" id="otherType">Bail</button>
                            </div>
                        </div>
                    </div>

                    <div class="tf-save mt-4">
                        <div class="wrap-button flex justify-center">
                            <button class="sc-button" type="submit"><span>Modifier</span></button>
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
    const currentCategory = parseInt(`{{ old('category', $publication->category) }}`);
    const currentType = parseInt(`{{ old('type', $publication->type) }}`);

    function chooseCategory(type) {
        document.getElementById('category').value = type;
        document.getElementById('immoBtn').classList.toggle("bg-primary", type == 1);
        document.getElementById('autoBtn').classList.toggle("bg-primary", type == 2);
        document.getElementById('otherType').textContent = type == 1 ? "Bail" : "";
    }

    function chooseType(type, self) {
        document.getElementById('type').value = type;
        document.querySelectorAll('.btn.btn-black').forEach(btn => btn.classList.remove('primary-background'));
        self.classList.add('primary-background');
    }

    document.getElementById('tf-upload-img').addEventListener('change', function (event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('preview-container');
        previewContainer.innerHTML = '';
        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = e => {
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

    // Appliquer la sélection initiale
    chooseCategory(currentCategory);
    setTimeout(() => {
        const buttons = document.querySelectorAll('button[onclick^="chooseType"]');
        buttons.forEach(btn => {
            if (btn.textContent.trim().toLowerCase() === (currentType === 1 ? "location" : currentType === 2 ? "vente" : "bail")) {
                chooseType(currentType, btn);
            }
        });
    }, 100);
</script>
@endsection
