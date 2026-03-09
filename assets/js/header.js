// Control opening the catalog drop-down menu in the header
const headerCatalogBtn = document.querySelector('.header__catalog-btn');
const headerCatalogNav = document.querySelector('.header__catalog-nav');

function openHeaderCatalog() {
    headerCatalogNav.setAttribute('open', 'true');
}

function closeHeaderCatalog() {
    headerCatalogNav.setAttribute('open', 'false');
}

function toggleHeaderCatalog(event) {

    event.stopPropagation();

    const isOpen = headerCatalogNav.getAttribute('open') === 'true';

    if (isOpen) {
        closeHeaderCatalog();
    } else {
        openHeaderCatalog();
    }
}

headerCatalogBtn.addEventListener('click', toggleHeaderCatalog);

document.addEventListener('click', function(event) {

    const clickInsideMenu = headerCatalogNav.contains(event.target);
    const clickOnButton = headerCatalogBtn.contains(event.target);

    if (!clickInsideMenu && !clickOnButton) {
        closeHeaderCatalog();
    }

});