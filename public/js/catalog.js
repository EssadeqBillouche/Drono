// Open a modal by ID with animation
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        // Reset modal position and fade in
        modal.style.display = 'flex';
        modal.style.opacity = '0';
        modal.style.pointerEvents = 'auto';

        // Add entry animation for modal content
        const modalContent = modal.querySelector('.modal-content');
        if (modalContent) {
            modalContent.style.transform = 'scale(0.9)';
            modalContent.style.opacity = '0';
        }
        // Trigger reflow
        window.getComputedStyle(modal).opacity;

        // Animate modal background
        modal.style.opacity = '1';

        // Animate modal content
        if (modalContent) {
            setTimeout(() => {
                modalContent.style.transform = 'scale(1)';
                modalContent.style.opacity = '1';
            }, 50);
        }

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

// Close a modal by ID with animation
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        // Add exit animation for modal content
        const modalContent = modal.querySelector('.modal-content');
        if (modalContent) {
            modalContent.style.transform = 'scale(0.9)';
            modalContent.style.opacity = '0';
        }

        // Fade out modal background
        modal.style.opacity = '0';

        // Remove active class and clean up
        setTimeout(() => {
            modal.classList.remove('active');
            modal.style.pointerEvents = 'none';
            document.body.style.overflow = 'auto';
        }, 300);
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Ensure all modals are properly configured initially
    document.querySelectorAll('.modal--window').forEach(modal => {
        modal.classList.remove('active');
        modal.style.display = 'none';
    });

    // Close modal when clicking outside content
    document.querySelectorAll('.modal--window').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this.id);
            }
        });
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal--window.active').forEach(modal => {
                closeModal(modal.id);
            });
        }
    });

    // Add click event to product cards
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('click', function(e) {
            const modalId = this.getAttribute('data-modal');
            if (modalId) {
                openModal(modalId);
            }
        });
    });

    // Optional: Animation when page loads
    document.querySelectorAll('.product-card').forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';

        setTimeout(() => {
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 100 + (index * 50));
    });
});
