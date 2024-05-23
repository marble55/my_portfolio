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

let currentModal = null;

let openModal = function(modalClick) {
    currentModal = modalViews[modalClick];
    console.log('Opening modal:', currentModal); // Log to see which modal is being opened
    currentModal.classList.add('active-modal');
    document.body.style.overflow = 'hidden';  // Disable background scrolling
    centerModal(currentModal);
};

let closeModal = function() {
    if (currentModal) {
        console.log('Closing modal:', currentModal); // Log to see which modal is being closed
        currentModal.classList.remove('active-modal');
        document.body.style.overflow = '';  // Enable background scrolling
        currentModal = null;
    }
};

let centerModal = function(modal) {
    const scrollY = window.scrollY;
    const viewportHeight = window.innerHeight;
    const modalHeight = modal.offsetHeight;
    modal.style.top = `${scrollY + (viewportHeight / 2) - (modalHeight / 2)}px`;
};

modalBtns.forEach((mb, i) => {
    mb.addEventListener('click', (event) => {
        event.stopPropagation(); // Stop propagation to prevent window click event
        openModal(i);
    });
});

modalClose.forEach((mc) => {
    mc.addEventListener('click', closeModal);
});

// Close modal when clicking outside
window.addEventListener('click', (event) => {
    if (currentModal && !currentModal.querySelector('.services_modal-content').contains(event.target)) {
        console.log('Clicked outside modal:', event.target); // Log to see what element was clicked outside modal
        closeModal();
    }
});

// Update modal position on scroll and resize
window.addEventListener('scroll', () => {
    if (currentModal) {
        centerModal(currentModal);
    }
});

window.addEventListener('resize', () => {
    if (currentModal) {
        centerModal(currentModal);
    }
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


/*=============== WORK MODAL ===============*/
const workModals = document.querySelectorAll('.work_modal'),
    readMoreLinks = document.querySelectorAll('.work_button'),
    workCloseButtons = document.querySelectorAll('.work_modal-close');

let currentWorkModal = null;

let openWorkModal = function(modalClick) {
    currentWorkModal = workModals[modalClick];
    console.log('Opening work modal:', currentWorkModal); // Log to see which modal is being opened
    currentWorkModal.classList.add('active-modal');
    document.body.style.overflow = 'hidden';  // Disable background scrolling
    centerModal(currentWorkModal);
};

let closeWorkModal = function() {
    if (currentWorkModal) {
        console.log('Closing work modal:', currentWorkModal); // Log to see which modal is being closed
        currentWorkModal.classList.remove('active-modal');
        document.body.style.overflow = '';  // Enable background scrolling
        currentWorkModal = null;
    }
};

readMoreLinks.forEach((link, i) => {
    link.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent default link behavior
        event.stopPropagation(); // Stop propagation to prevent window click event
        openWorkModal(i);
    });
});

workCloseButtons.forEach((wcb) => {
    wcb.addEventListener('click', closeWorkModal);
});

// Close modal when clicking outside
window.addEventListener('click', (event) => {
    if (currentWorkModal && !currentWorkModal.querySelector('.work_modal-content').contains(event.target)) {
        console.log('Clicked outside work modal:', event.target); // Log to see what element was clicked outside modal
        closeWorkModal();
    }
});

// Update modal position on scroll
window.addEventListener('scroll', () => {
    if (currentWorkModal) {
        centerModal(currentWorkModal);
    }
});
