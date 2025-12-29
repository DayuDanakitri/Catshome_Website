<div id="catModal" class="cat-modal-overlay" style="display: none;">
    <div class="cat-modal-box">

        <div class="cat-info">
            <div class="cat-name-row">
                <button class="btn-back" id="closeCatModal">&#8592;</button>

                <h1 class="cat-name">
                    <span id="modalCatName"></span>
                    <img src="{{ asset('gambar/catssymbol.png') }}" class="cat-symbol">
                </h1>
            </div>

            <p class="cat-description" id="modalCatBio"></p>

            <ul class="cat-details">
                <li><img src="{{ asset('gambar/paw.png') }}"> Gender: <span id="modalCatGender"></span></li>
                <li><img src="{{ asset('gambar/paw.png') }}"> Age: <span id="modalCatAge"></span> years old</li>
                <li><img src="{{ asset('gambar/paw.png') }}"> Breed: <span id="modalCatBreed"></span></li>
                <li><img src="{{ asset('gambar/paw.png') }}"> Location: <span id="modalCatLocation"></span></li>
            </ul>
        </div>

        <div class="cat-image-section">
            <img id="modalCatPhoto" class="cat-image">
            <a id="modalAdoptLink" class="adopt-btn">Click here to adopt</a>
        </div>
    </div>
</div>
