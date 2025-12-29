document.addEventListener('DOMContentLoaded', function () { 
    const modal = document.getElementById('catModal');
    const closeBtn = document.getElementById('closeCatModal');

    if (!modal) return;

    document.querySelectorAll('.openCatModal').forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('modalCatName').innerText = this.dataset.name;
            document.getElementById('modalCatBio').innerText = this.dataset.bio;
            document.getElementById('modalCatGender').innerText = this.dataset.gender;
            document.getElementById('modalCatAge').innerText = this.dataset.age;
            document.getElementById('modalCatBreed').innerText = this.dataset.breed;
            document.getElementById('modalCatLocation').innerText = this.dataset.location;
            document.getElementById('modalCatPhoto').src = this.dataset.photo;

            // SET HREF LINK DENGAN ID KUCING
            document.getElementById('modalAdoptLink').href = '/adoption-form/' + this.dataset.id;

            modal.style.display = 'flex';
        });
    });

    closeBtn.addEventListener('click', function () {
        modal.style.display = 'none';
    });
});
