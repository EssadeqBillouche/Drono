// Handle image preview for single image upload
function previewImage(event) {
    const imagePreview = document.getElementById('image-preview');
    imagePreview.innerHTML = '';

    const file = event.target.files[0];
    if (!file || !file.type.startsWith('image/')) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        const div = document.createElement('div');
        div.className = 'relative group';

        const img = document.createElement('img');
        img.src = e.target.result;
        img.className = 'h-32 w-full object-cover rounded-md border border-gray-200';
        div.appendChild(img);

        // Add label
        const badge = document.createElement('span');
        badge.className = 'absolute top-1 left-1 bg-primary text-white text-xs px-2 py-1 rounded';
        badge.textContent = 'Product Image';
        div.appendChild(badge);

        // Add remove button
        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.className = 'absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity';
        removeBtn.innerHTML = '<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>';
        removeBtn.onclick = function() {
            div.remove();
            document.getElementById('image').value = '';
        };
        div.appendChild(removeBtn);

        imagePreview.appendChild(div);
    };
    reader.readAsDataURL(file);
}

// Modal open/close
function closeAddProductModal() {
    document.getElementById('add-product-modal').classList.add('hidden');
}

function openAddProductModal() {
    document.getElementById('add-product-modal').classList.remove('hidden');
}

// Basic form field validation
function validateField(field) {
    const errorElement = document.getElementById(`${field.id}-error`);
    if (errorElement) {
        errorElement.remove();
    }

    if (field.hasAttribute('required') && !field.value) {
        const errorMessage = document.createElement('p');
        errorMessage.id = `${field.id}-error`;
        errorMessage.className = 'mt-1 text-sm text-red-600';
        errorMessage.textContent = 'This field is required';
        field.parentNode.appendChild(errorMessage);
        return false;
    }

    if (field.id === 'price' && parseFloat(field.value) < 0) {
        const errorMessage = document.createElement('p');
        errorMessage.id = `${field.id}-error`;
        errorMessage.className = 'mt-1 text-sm text-red-600';
        errorMessage.textContent = 'Price must be at least 0';
        field.parentNode.appendChild(errorMessage);
        return false;
    }

    if (field.id === 'stock' && parseInt(field.value) < 0) {
        const errorMessage = document.createElement('p');
        errorMessage.id = `${field.id}-error`;
        errorMessage.className = 'mt-1 text-sm text-red-600';
        errorMessage.textContent = 'Stock must be at least 0';
        field.parentNode.appendChild(errorMessage);
        return false;
    }

    return true;
}

// Initialize event listeners when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Optional: Add client-side validation for immediate feedback
    // This doesn't prevent form submission, just provides feedback
    const requiredFields = document.querySelectorAll('[required]');
    requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
            validateField(this);
        });
    });
});
