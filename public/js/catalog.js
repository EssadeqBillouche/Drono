// Open a modal by ID
function openModal(modalId) {
    console.log('Opening modal:', modalId); // Debug
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    } else {
        console.error('Modal not found:', modalId);
    }
}

// Close a modal by ID
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
}

// Update main image in modal
function updateMainImage(imageId, src, thumbnail) {
    const mainImage = document.getElementById(imageId);
    if (mainImage) {
        mainImage.src = src;
        const thumbnails = thumbnail.parentElement.querySelectorAll('.thumbnail');
        thumbnails.forEach(t => t.classList.remove('active', 'border-primary'));
        thumbnail.classList.add('active', 'border-primary');
    }
}

// Update quantity input
function updateQuantity(inputId, change) {
    const input = document.getElementById(inputId);
    if (input) {
        let value = parseInt(input.value) + change;
        if (value < 1) value = 1;
        input.value = value;
    }
}

// Add to cart with animation
function addToCart(buttonId) {
    const button = document.getElementById(buttonId);
    if (button) {
        button.classList.add('added');
        setTimeout(() => {
            button.classList.remove('added');
        }, 1500);
        alert('Added to cart!');
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    // Ensure all modals are hidden initially
    document.querySelectorAll('.modal--window').forEach(modal => {
        modal.classList.remove('active');
        modal.style.display = 'flex';
        modal.style.opacity = '0';
        modal.style.pointerEvents = 'none';
    });

    // Close modal when clicking outside content
    document.querySelectorAll('.modal--window').forEach(modal => {
        modal.addEventListener('click', function (e) {
            if (e.target === this) {
                this.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal--window.active').forEach(modal => {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });
        }
    });

    // Category pill selection
    const categoryPills = document.querySelectorAll('.category-pill');
    categoryPills.forEach(pill => {
        pill.addEventListener('click', function () {
            categoryPills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Add click event to product cards
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('click', function () {
            console.log('Product card clicked:', this); // Debug
            const modalId = this.getAttribute('data-modal') || this.getAttribute('onclick')?.match(/'([^']+)'/)?.[1];
            if (modalId) {
                openModal(modalId);
            }
        });
    });
});
