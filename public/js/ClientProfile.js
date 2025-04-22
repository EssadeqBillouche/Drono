// Add this script at the very end of your body tag
document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM fully loaded");

    // First, hide all sections except the first one using inline styles
    const allSections = document.querySelectorAll('.section');
    console.log("Found " + allSections.length + " sections");

    allSections.forEach((section, index) => {
        // Force hide all sections with inline style
        section.style.display = 'none';
    });

    // Show the first section or the one in the URL hash
    let initialSection = 'profile';
    if (window.location.hash) {
        initialSection = window.location.hash.substring(1);
    }

    // Show the initial section
    const sectionToShow = document.getElementById(initialSection + '-section');
    if (sectionToShow) {
        sectionToShow.style.display = 'block';
        console.log("Initially showing section: " + initialSection);
    } else {
        console.log("Could not find initial section: " + initialSection);
        // Fallback to first section if the hash section doesn't exist
        if (allSections.length > 0) {
            allSections[0].style.display = 'block';
        }
    }

    // Update the active navigation link
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.classList.remove('bg-primary/10', 'text-primary', 'font-medium');
        link.classList.add('text-[#2f2f2f]', 'hover:bg-gray-100');

        const sectionId = link.getAttribute('data-section');
        if (sectionId === initialSection) {
            link.classList.remove('text-[#2f2f2f]', 'hover:bg-gray-100');
            link.classList.add('bg-primary/10', 'text-primary', 'font-medium');
        }
    });

    // Add click handlers to all navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const sectionId = this.getAttribute('data-section');
            console.log("Clicked on section: " + sectionId);

            // Hide all sections
            allSections.forEach(section => {
                section.style.display = 'none';
            });

            // Show the selected section
            const targetSection = document.getElementById(sectionId + '-section');
            if (targetSection) {
                targetSection.style.display = 'block';
                console.log("Showing section: " + sectionId);
            } else {
                console.log("Could not find section: " + sectionId);
            }

            // Update active nav link
            navLinks.forEach(navLink => {
                navLink.classList.remove('bg-primary/10', 'text-primary', 'font-medium');
                navLink.classList.add('text-[#2f2f2f]', 'hover:bg-gray-100');
            });

            this.classList.remove('text-[#2f2f2f]', 'hover:bg-gray-100');
            this.classList.add('bg-primary/10', 'text-primary', 'font-medium');

            // Update URL hash
            window.location.hash = sectionId;
        });
    });
});
