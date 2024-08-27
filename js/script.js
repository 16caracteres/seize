// Menu Burger
const body = document.body;
const boutonBurger = document.querySelector('.menu__burger');
const menu = document.querySelector('.menu__list-burger');
const menuLink = document.querySelectorAll('.menu__list-burger li')

boutonBurger.addEventListener("click", () => {
    menu.classList.toggle("active");
    boutonBurger.classList.toggle("active");
    body.classList.toggle("no-scroll");
})

menuLink.forEach((link) => {
    link.addEventListener("click", () => {
        menu.classList.remove("active");
        boutonBurger.classList.remove("active");
        //menuLink.forEach(link => link.classList.remove("menu-clic"));
        document.body.classList.remove("no-scroll");
    })
});


// Transition Swup 
/*const swup = new Swup( {
    containers: ["#swup"]
});*/