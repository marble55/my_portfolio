import './bootstrap';
import './main.ts';
// import './main.js'

/*=============== CHANGE BACKGROUND HEADER ===============*/
const scrollHeader = () => {
    const header = document.getElementById('header')
    // Add a class if the bottom offset is greater than 50 of the viewport
    window.scrollY >= 50 ? header.classList.add('scroll-header')
        : header.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)


/*=============== SERVICES MODAL ===============*/
const modalViews = document.querySelectorAll('.services_modal'),
    modalBtns = document.querySelectorAll('.services_button'),
    modalClose = document.querySelectorAll('.services_modal-close');

// Function to center the modal
function centerModal(modal) {
    const scrollY = window.scrollY;
    const viewportHeight = window.innerHeight;
    const modalHeight = modal.offsetHeight;
    modal.style.top = `${scrollY + (viewportHeight / 2) - (modalHeight / 2)}px`;
}

let modal = function (modalClick) {
    const currentModal = modalViews[modalClick];
    currentModal.classList.add('active-modal');
    centerModal(currentModal);

    window.addEventListener('scroll', () => centerModal(currentModal));
    window.addEventListener('resize', () => centerModal(currentModal));
}

modalBtns.forEach((mb, i) => {
    mb.addEventListener('click', () => {
        modal(i);
    });
});

modalClose.forEach((mc) => {
    mc.addEventListener('click', () => {
        modalViews.forEach((mv) => {
            mv.classList.remove('active-modal');
        });

        window.removeEventListener('scroll', centerModal);
        window.removeEventListener('resize', centerModal);
    });
});

/*=============== MIXITUP FILTER PORTFOLIO ===============*/
let miserPortfolio = mixitup('.work_container', {
    selectors: {
        target: '.work_card'
    },
    animation: {
        duration: 300
    }
});


/* Link active work */
const linkWork = document.querySelectorAll('.work_item')

function activeWork() {
    linkWork.forEach(l => l.classList.remove('active-work'))
    this.classList.add('active-work')
}

linkWork.forEach(l => l.addEventListener('click', activeWork))

/*=============== SWIPER TESTIMONIAL ===============*/

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
const sections = document.querySelectorAll('section[id]')

const scrollActive = () => {
    const scrollDown = window.scrollY

    sections.forEach(current => {
        const sectionHeight = current.offsetHeight,
            sectionTop = current.offsetTop - 58,
            sectionId = current.getAttribute('id'),
            sectionsClass = document.querySelector('.nav_menu a[href*=' + sectionId + ']')

        if (scrollDown > sectionTop && scrollDown <= sectionTop + sectionHeight) {
            sectionsClass.classList.add('active_link')
        } else {
            sectionsClass.classList.remove('active_link')
        }
    })
}
window.addEventListener('scroll', scrollActive)


/*=============== LIGHT DARK THEME ===============*/


/*=============== SCROLL REVEAL ANIMATION ===============*/
const hsr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 2500,
    delay: 200,
})

hsr.reveal('.home_data')
hsr.reveal('.home_handle', { delay: 700 })
hsr.reveal('.home_social, .home_scroll', { delay: 900, origin: 'bottom' })
// hsr.reveal('.header'), {delay: 1400, origin: 'top'}
// hsr.reveal('.nav_menu'),{delay: 700, origin: 'bottom'}

const sr = ScrollReveal({
    duration: 2500,
    delay: 200,
    reset: true, // Reset elements when they move out of view
});

// Reveal section__subtitle with origin from bottom
sr.reveal('.section__subtitle', { origin: 'bottom', distance: '20px', delay: 200 });

// Reveal section__title with origin from bottom
sr.reveal('.section__title', { origin: 'bottom', distance: '20px', delay: 400 });

// Reveal about_img with origin from left
sr.reveal('.about_img', { origin: 'left', distance: '20px', delay: 600 });

// Reveal about_box elements with origin from right
sr.reveal('.about_box', { origin: 'right', distance: '20px', interval: 200, delay: 800 });

// Reveal about_description with origin from right
sr.reveal('.about_description', { origin: 'right', distance: '20px', delay: 1000 });

// Reveal button with origin from right
// sr.reveal('.button', { origin: 'right', distance: '20px', delay: 1200 });