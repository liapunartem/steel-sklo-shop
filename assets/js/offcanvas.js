// control of opening the shopping cart window
const cartBtns = document.querySelectorAll('.cart-btn');
const miniCart = document.querySelector('.mini-cart');
const miniCartCloseBtn = miniCart.querySelector('.mini-cart__close-btn');
const miniCartOverlay = miniCart.querySelector('.overlay');

function openCart() {
    miniCart.setAttribute('open', 'true');
}

function closeCart() {
    miniCart.setAttribute('open', 'false');
}

cartBtns.forEach(btn => {
    btn.addEventListener('click', openCart);
});
miniCartCloseBtn.addEventListener('click', closeCart);
miniCartOverlay.addEventListener('click', closeCart);


// Mobile menu opening control
const burgerBtn = document.querySelector('.burger-menu-btn');
const mobileMenu = document.querySelector('.mobile-menu');

const mobileMenuOverlay = mobileMenu.querySelector('.overlay');

function toggleMobileMenu() {
    const isActive = burgerBtn.getAttribute('active') === 'true';

    if (isActive) {
        // Закрити меню
        burgerBtn.setAttribute('active', 'false');
        mobileMenu.setAttribute('open', 'false');
    } else {
        // Відкрити меню
        burgerBtn.setAttribute('active', 'true');
        mobileMenu.setAttribute('open', 'true');
    }
}

burgerBtn.addEventListener('click', toggleMobileMenu);
mobileMenuOverlay.addEventListener('click', toggleMobileMenu);
