document.addEventListener('DOMContentLoaded', function () {
    const overlay = document.getElementById('catModal'); 
    const closeButtons = overlay.querySelectorAll('.close-btn'); 
    const catButtons = document.querySelectorAll('.btn-cat');
    const adoptBtn = overlay.querySelector('.adopt-btn');

    let currentCatId = null; 

    function openModal(catId) {
        currentCatId = catId; 
        overlay.style.display = 'flex';
        console.log('Modal opened for cat id:', catId);
    }

    function closeModal() {
        overlay.style.display = 'none';
        console.log('Modal closed');
    }

    catButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault(); 
            const catId = button.dataset.id;
            openModal(catId);
        });
    });

    closeButtons.forEach(btn => {
        btn.addEventListener('click', closeModal);
    });

    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) closeModal();
    });

    if (adoptBtn) {
        adoptBtn.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal();
            if (currentCatId) {
                window.location.href = '/adoption-form/' + currentCatId;
            }
        });
    }
});
