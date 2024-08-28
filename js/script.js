// Transition Page 
window.onload = () => {
    const anchors = document.querySelectorAll("a:not(.text__link, .menu__list li a, .footer__menu #menu-item-6 a, .footer__menu #menu-item-7 a)");
    const transition_el = document.querySelector(".page-transition");
    setTimeout(() => {
      transition_el.classList.remove("is-active");
    }, 300); // On retire la classe .is-active

    console.log(anchors);
    console.log(transition_el);
    
    for (let i = 0; i < anchors.length; i++) {
      const anchor = anchors[i];
      anchor.addEventListener("click", (e) => {
        if (e.ctrlKey) {
        } else {
          e.preventDefault();
          let target = e.currentTarget.href;
          console.log(transition_el);
          transition_el.classList.add("is-active");
          if (target == null) {
            setTimeout(() => {
              window.location.href = "https://16caracteres.com";
            }, 300);
          } else {
            setTimeout(() => {
              window.location.href = target;
            }, 300);
          }
        }
      });
    }
  };

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


