function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

function updateMainImage(imageId, src, thumbnail) {
    document.getElementById(imageId).src = src;
    const thumbnails = thumbnail.parentElement.querySelectorAll('.thumbnail');
    thumbnails.forEach(t => t.classList.remove('active', 'border-primary'));
    thumbnail.classList.add('active', 'border-primary');
}

function updateQuantity(inputId, change) {
    const input = document.getElementById(inputId);
    let value = parseInt(input.value) + change;
    if (value < 1) value = 1;
    input.value = value;
}

function addToCart(btnId) {
    const btn = document.getElementById(btnId);
    btn.classList.add('added');
    btn.disabled = true;
    setTimeout(() => {
        btn.classList.remove('added');
        btn.disabled = false;
    }, 1500);
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Close modal when clicking outside
    const modals = document.querySelectorAll('.modal--window');
    modals.forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    });

    // Category pill selection
    const categoryPills = document.querySelectorAll('.category-pill');
    categoryPills.forEach(pill => {
        pill.addEventListener('click', function() {
            categoryPills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
