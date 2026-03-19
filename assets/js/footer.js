// Catalog opening animation for mobile
document.addEventListener('DOMContentLoaded', () => {
    const FooterCatalogTitle = document.querySelector('.footer__catalog-title');
    const FooterCatalog  = document.querySelector('.footer__catalog');

    if (!FooterCatalogTitle || !FooterCatalog) return;

    FooterCatalogTitle.addEventListener('click', () => {
        FooterCatalog.classList.toggle('is-open');
    });
});