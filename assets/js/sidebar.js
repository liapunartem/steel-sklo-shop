// Hiding the sidebar
document.addEventListener('DOMContentLoaded', () => {

    const wrapper = document.querySelector('.homepage-top');
    const toggleBtn = document.querySelector('.header__catalog-btn');

    if (!wrapper || !toggleBtn) return;

    toggleBtn.addEventListener('click', () => {
        wrapper.classList.toggle('sidebar-hidden');
    });

});
