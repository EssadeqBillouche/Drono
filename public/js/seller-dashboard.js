// Mobile sidebar toggle
document.addEventListener("DOMContentLoaded", () => {
    const mobileMenuButton = document.getElementById("mobile-menu-button")
    const sidebar = document.querySelector("aside")

    if (mobileMenuButton && sidebar) {
        mobileMenuButton.addEventListener("click", () => {
            sidebar.classList.toggle("hidden")
            sidebar.classList.toggle("fixed")
            sidebar.classList.toggle("inset-0")
            sidebar.classList.toggle("z-50")
        })
    }

    // Close sidebar when clicking outside on mobile
    document.addEventListener("click", (event) => {
        if (
            window.innerWidth < 768 &&
            !sidebar.contains(event.target) &&
            !mobileMenuButton.contains(event.target) &&
            !sidebar.classList.contains("hidden")
        ) {
            sidebar.classList.add("hidden")
            sidebar.classList.remove("fixed", "inset-0", "z-50")
        }
    })

    // User menu toggle
    const userMenuButton = document.getElementById("user-menu-button")
    const userMenu = document.getElementById("user-menu")

    if (userMenuButton && userMenu) {
        userMenuButton.addEventListener("click", () => {
            userMenu.classList.toggle("hidden")
        })

        // Close user menu when clicking outside
        document.addEventListener("click", (event) => {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add("hidden")
            }
        })
    }
})
