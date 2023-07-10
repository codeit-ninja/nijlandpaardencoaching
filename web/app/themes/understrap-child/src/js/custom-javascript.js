// Add your custom JS here.
document.addEventListener('DOMContentLoaded', () => {
    const mobileMenu = document.querySelector('#mobile-menu');
    const menuCloseBtn = document.createElement('a');

    menuCloseBtn.dataset.bsDismiss = 'offcanvas';
    menuCloseBtn.href = 'javascript:void(0);';
    menuCloseBtn.innerHTML = '<i class="fa-thin fa-arrow-left-long"></i>';
    menuCloseBtn.classList.add('offcanvas-close');

    //mobileMenu.after(menuCloseBtn);
})