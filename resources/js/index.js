console.log("Index.js file is loaded");

const hamburgerBtn = document.querySelector("#menu-btn");
const mobileMenu = document.querySelector("#menu");

hamburgerBtn.addEventListener("click", () => {
    hamburgerBtn.classList.toggle("open");
    mobileMenu.classList.toggle("flex");
    mobileMenu.classList.toggle("hidden");
});

// Function to close the popup menu
const closeMenu = () => {
    hamburgerBtn.classList.remove("open");
    mobileMenu.classList.remove("flex");
    mobileMenu.classList.add("hidden");
};

// Close menu when clicking outside of it
document.addEventListener("click", (event) => {
    const isClickInsideMenu = mobileMenu.contains(event.target);
    const isClickOnHamburger = hamburgerBtn.contains(event.target);

    if (!isClickInsideMenu && !isClickOnHamburger) {
        closeMenu();
    }
});

// Remove the the flash messages
const flashMsg = document.getElementById("flash-success");

function popOut() {
    document.getElementById("flash-success").remove();
}

if (flashMsg) {
    setTimeout(popOut, 4000);
}
