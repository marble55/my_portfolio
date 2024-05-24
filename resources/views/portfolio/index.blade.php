<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.png') }}" type="image/x-icon">
    <!--=============== BOXICONS ===============-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://unpkg.com/micromodal/dist/micromodal.min.js">
    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/swiper-bundle.min.css') }}">
    <!--=============== CSS ===============-->
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- JS  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
        function onSubmit(token) {
            document.getElementById("contactForm").submit();
        }
    </script>
    <title> Zeler Jim Portfoliio </title>
</head>

<body>
    <div class="cursor"></div>
    <div class="follow"></div>

    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav_logo increase-size-on-hover">{{ $heroSections->name_title ?? 'Zeller Jim' }}
            </a>

            <div class="nav_menu">
                <ul class="nav_list">
                    <li class="nav_item">
                        <a href="#home" class="nav_link active_link">
                            <i class='bx bx-home-alt'></i>
                        </a>
                    </li>

                    <li class="nav_item">
                        <a href="#about" class="nav_link">
                            <i class='bx bx-user'></i>
                        </a>
                    </li>

                    <li class="nav_item">
                        <a href="#skills" class="nav_link">
                            <i class='bx bxs-book-content'></i>
                        </a>
                    </li>

                    <li class="nav_item">
                        <a href="#services" class="nav_link">
                            <i class='bx bxs-book-content'></i>
                        </a>
                    </li>

                    <li class="nav_item">
                        <a href="#work" class="nav_link">
                            <i class='bx bx-briefcase'></i>
                        </a>
                    </li>

                    <li class="nav_item">
                        <a href="#contact" class="nav_link">
                            <i class='bx bx-envelope'></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Theme change button -->
            @if (session()->has('message'))
                <div class="notification inform-notification">Your Message Has Been Sent :)</div>
            @endif

            @if (session()->has('error'))
                <div class="notification error-notification">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="notification error-notification">
                    @foreach ($errors->all() as $error)
                        <span class="error-message">{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Function to remove elements with a specified class after a delay
                    function removeElementsAfterDelay(className, delay) {
                        setTimeout(function() {
                            var elements = document.getElementsByClassName(className);
                            Array.prototype.forEach.call(elements, function(element) {
                                element.style.transition = "opacity 1s";
                                element.style.opacity = 0;
                                setTimeout(function() {
                                    element.remove();
                                }, 1000);
                            });
                        }, delay);
                    }


                    removeElementsAfterDelay('inform-notification', 10000);
                    removeElementsAfterDelay('error-notification', 10000);
                });
            </script>


        </nav>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main ">

        <div class="cursor"></div>

        <!--=============== Bubble Background ===============-->
        {{-- <div class="gradient-background">
            <svg xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <filter id="goo">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                        <feColorMatrix in="blur" mode="matrix"
                            values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18  -8" result="goo" />
                        <feBlend in="SourceGraphic" in2="goo" />
                    </filter>
                </defs>
            </svg>
            <div class="background gradients-container">
                <div class="g1"></div>
                <div class="g2"></div>
                <div class="g3"></div>
                <div class="g4"></div>
                <div class="g5"></div>
                <div class="g7"></div>
                <div class="g8"></div>
                <div class="g9"></div>
                <div class="g10"></div>
                <div class="interactive"></div>
            </div> --}}

        <!--=============== HOME ===============-->
        <section class="home section" id="home">
            <div class="home_container container grid">

                <div class="home_data increase-size-on-hover">
                    <span class="home_greeting ">Hello, I'm</span>
                    <h1 class="home_name title "> {{ $heroSections->name_title ?? 'Zeller Jim' }}
                    </h1>
                    <h3 class="home_education "> {{ $heroSections->sub_title ?? 'Web Developer' }}
                    </h3>

                    <div class="home_buttons">
                        <a download="ZellerJim_CV" href="{{ $cv_document ?? '#' }}"
                            class="button button--ghost increase-size-on-hover">
                            Download CV
                        </a>
                        <a href="#about" class="button ">About Me</a>
                    </div>
                </div>

                <div class="home_handle">
                    <img src="{{ $heroSections->image_path ?? URL::asset('assets/img/perfil.png') }}" alt
                        class="home_img">
                </div>

                <div class="home_social">
                    @if ($socialLinks)
                        @foreach ($socialLinks as $socialLink)
                            <a href="{{ $socialLink->link }}" class="home_social-link">
                                <i class='{{ $socialLink->icon_path }}'></i>
                            </a>
                        @endforeach
                    @endif
                    {{-- <a href class="home_social-link">
                        <i class='bx bxl-facebook-circle'></i>
                    </a> --}}
                </div>

                <a href="#about" class="home_scroll">
                    <i class='bx bx-mouse home_scroll-icon'></i>
                    <span class="home_scroll-name">Scroll Down</span>
                </a>
            </div>
        </section>

        <!--=============== ABOUT ===============-->
        <section class="about section" id="about">
            <span class="section__subtitle">My Intro</span>
            <h2 class="section__title">About Me</h2>

            <div class="about_container container grid">
                <img src="{{ $abouts->image_path ?? URL::asset('assets/img/about.jpg') }}" alt class="about_img">

                <div class="about_data">
                    <div class="about_info">

                        <div class="about_box">
                            <i class='{{ $aboutFact1->icon ?? 'bx bx-award about_icon' }}'></i>
                            <h3 class="about_title">{{ $aboutFact1->title ?? 'Experience' }}</h3>
                            <span class="about_subtitle">{{ $aboutFact1->description ?? '8 Years Working' }}</span>
                        </div>

                        <div class="about_box">
                            <i class='{{ $aboutFact1->icon ?? 'bx bx-briefcase-alt-2 about_icon' }}'></i>
                            <h3 class="about_title">{{ $aboutFact1->title ?? 'Completed' }}</h3>
                            <span class="about_subtitle">{{ $aboutFact1->description ?? '48+ Projects' }}</span>
                        </div>

                        <div class="about_box">
                            <i class='{{ $aboutFact1->icon ?? 'bx bx-support about_icon' }}'></i>
                            <h3 class="about_title">{{ $aboutFact1->title ?? 'Support' }}</h3>
                            <span class="about_subtitle">{{ $aboutFact1->description ?? 'Online 24/7' }}</span>
                        </div>

                    </div>

                    <p class="about_description">
                        {{ $abouts->description ??
                            '
                                                                                                                                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                                                                                                                        Veniam libero consequuntur nobis laboriosam temporibus
                                                                                                                                                                        laborum eaque, praesentium rem nostrum deserunt
                                                                                                                                                                        inventore sunt! Recusandae veritatis a, aperiam aut
                                                                                                                                                                        ipsam officiis vero?' }}
                    </p>
                    <a href="#contact" class="button">Contact Me</a>
                </div>
            </div>


        </section>


        <!--=============== SKILLS ===============-->
        <section class="skills section" id="skills">
            <span class="section__subtitle">My abilities</span>
            <h2 class="section__title">My Experience</h2>

            <div class="skills_container container swiper">
                <div class="swiper-wrapper">
                    <div class="skills_content swiper-slide">
                        <h3 class="skills_title">Skills</h3>

                        <div class="skills_box">
                            @if ($skillLists)
                                @foreach ($skillLists as $skill)
                                    <div class="skills_data">
                                        <i class='{{ $skill->icon ?? 'bx bx-badge-check' }}'></i>

                                        <div>
                                            <h3 class="skills_name">{{ $skill->title ?? 'HTML' }}</h3>
                                            <span class="skills_level">{{ $skill->description ?? 'Basic' }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="skills_content swiper-slide">
                        <h3 class="skills_title">Experience</h3>

                        <div class="skills_box">
                            @if ($experienceLists)
                                @foreach ($experienceLists as $experience)
                                    <div class="skills_data">
                                        <i class='{{ $experience->icon ?? 'bx bx-badge-check' }}'></i>

                                        <div>
                                            <h3 class="skills_name">{{ $experience->title ?? 'HTML' }}</h3>
                                            <span
                                                class="skills_level">{{ $experience->description ?? 'Basic' }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="skills_content swiper-slide">
                        <h3 class="skills_title">Education</h3>

                        <div class="skills_box">
                            @if ($educationLists)
                                @foreach ($educationLists as $education)
                                    <div class="skills_data">
                                        <i class='{{ $education->icon ?? 'bx bx-badge-check' }}'></i>

                                        <div>
                                            <h3 class="skills_name">{{ $education->title ?? 'HTML' }}</h3>
                                            <span class="skills_level">{{ $education->description ?? 'Basic' }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <!--=============== SERVICES ===============-->
        <section class="services section" id="services">
            <span class="section__subtitle">My Services</span>
            <h2 class="section__title">What I Offer</h2>

            <div class="services_container container grid">

                @foreach ($services as $service)
                    <div class="services_card">
                        <h3 class="services_title">{{ $service->title ?? 'Product Designer' }}</h3>

                        <span class="services_button">
                            See more <i class='bx bx-right-arrow-alt services_icon'></i>
                        </span>

                        <div class="services_modal">
                            <div class="services_modal-content">
                                <i class='bx bx-x services_modal-close'></i>

                                <h3 class="services_modal-title">{{ $service->title ?? 'Product Designer' }}</h3>
                                <p class="services_modal-description">
                                    {{ $service->description ?? 'empty' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="services_card">
                        <h3 class="services_title">Visual <br> Designer</h3>

                        <span class="services_button">
                            See more <i class='bx bx-right-arrow-alt services_icon '></i>
                        </span>

                        <div class="services_modal">
                            <div class="services_modal-content">
                                <i class='bx bx-x services_modal-close'></i>

                                <h3 class="services_modal-title">Visual
                                    Designer</h3>
                                <p class="services_modal-description">
                                    Service with more than 3 years of
                                    experience.
                                    Providing quality work to clients and
                                    companies.
                                </p>

                                <ul class="services_modal-list">
                                    <li class="services_modal-item">
                                        <i class='bx bxs-check-square services_modal-icon'></i>

                                        <p class="services_modal-item">
                                            I develop the user interface.
                                        </p>
                                    </li>

                                    <li class="services_modal-item">
                                        <i class='bx bxs-check-square services_modal-icon'></i>

                                        <p class="services_modal-item">
                                            Web page development.
                                        </p>
                                    </li>

                                    <li class="services_modal-item">
                                        <i class='bx bxs-check-square services_modal-icon'></i>

                                        <p class="services_modal-item">
                                            I create ux element interactions.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="services_card">
                        <h3 class="services_title">Backend <br> Developer</h3>

                        <span class="services_button">
                            See more <i class='bx bx-right-arrow-alt services_icon'></i>
                        </span>

                        <div class="services_modal">
                            <div class="services_modal-content">
                                <i class='bx bx-x services_modal-close'></i>

                                <h3 class="services_modal-title">Visual
                                    Designer</h3>
                                <p class="services_modal-description">
                                    Service with more than 3 years of
                                    experience.
                                    Providing quality work to clients and
                                    companies.
                                </p>

                                <ul class="services_modal-list">
                                    <li class="services_modal-item">
                                        <i class='bx bxs-check-square services_modal-icon'></i>

                                        <p class="services_modal-item">
                                            I develop the user interface.
                                        </p>
                                    </li>

                                    <li class="services_modal-item">
                                        <i class='bx bxs-check-square services_modal-icon'></i>

                                        <p class="services_modal-item">
                                            Web page development.
                                        </p>
                                    </li>

                                    <li class="services_modal-item">
                                        <i class='bx bxs-check-square services_modal-icon'></i>

                                        <p class="services_modal-item">
                                            I create ux element interactions.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
            </div>
        </section>

        <!--=============== WORK ===============-->
        <section class="work section" id="work">
            <span class="section__subtitle">My Portfolio</span>
            <h2 class="section__title">Recent Works</h2>

            <div class="work_filters">
                <span class="work_item active-work" data-filter='all'>All</span>
                <span class="work_item" data-filter='.web'>Web</span>
                <span class="work_item" data-filter='.mobile'>Mobile</span>
                <span class="work_item" data-filter='.design'>Design</span>
            </div>

            <div class="work_container container grid">

                @if ($portfolios)
                    @foreach ($portfolios as $portfolio)
                        <div class="work_card web">
                            <img src="{{ $portfolio->image_path ?? 'assets/img/work1.jpg' }}" alt class="work_img">
                            <h3 class="work_title">{{ $portfolio->title ?? 'Web design' }}</h3>
                            <span class="work_button">
                                Read More <i class='bx bx-right-arrow-alt services_icon'></i>
                            </span>
                            <div class="work_modal">
                                <div class="work_modal-content">
                                    <i class='bx bx-x work_modal-close'></i>
                                    <h3 class="work_modal-title">{{ $portfolio->title ?? 'Web design' }}</h3>
                                    <p class="work_modal-description">
                                        {{ $portfolio->description ?? 'This is the description for the web design.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </section>

        <!--=============== CONTACT ===============-->
        <section class="contact section" id="contact">
            <span class="section__subtitle">Get in touch</span>
            <h2 class="section__title">Contact Me</h2>

            <div class="contact_container container grid">
                <div class="contact_info">

                    <h3 class="contact_title">Talk to me</h3>
                    <div class="contact_card">
                        <i class='bx bx-envelope contact_card-icon'></i>
                        <h3 class="contact_card-title">Email</h3>
                        <span class="contact_card-data">{{ $contacts->email ?? 'user@gmail.com' }}</span>
                    </div>

                    <div class="contact_card">
                        <i class='bx bxl-messenger contact_card-icon'></i>
                        <h3 class="contact_card-title">Telephone</h3>
                        <span class="contact_card-data">{{ $contact->phoneNumber ?? '+63 999 999 9999' }}</span>
                    </div>

                    <div class="contact_card">
                        <i class='{{ $social_contact->icon_path ?? 'bx bx-envelope contact_card-icon' }}'></i>
                        <h3 class="contact_card-title">{{ ucfirst($social_contact->platform) }}</h3>

                        <a href="{{ $social_contact_link ?? '#' }}" target="_blank" class="contact_button">
                            Message me <i class='bx bx-mail-send contact_button-icon'></i>
                        </a>
                    </div>
                </div>

                <div class="contact_content">
                    <h3 class="contact_title">Write me your project</h3>

                    <form id="contactForm" method="POST" action="{{ route('contact.send') }}"
                        class="contact_form">
                        @csrf
                        @method('POST')
                        <div class="contact_form-div">
                            <label for="" class="contact_form-tag">Name</label>
                            <input name="name" type="text" required placeholder="Ex:Jim"
                                class="contact_form-input">
                        </div>

                        <div class="contact_form-div">
                            <label for="" class="contact_form-tag">Email</label>
                            <input name="email" type="email" required placeholder="example@email.com"
                                class="contact_form-input">
                        </div>

                        <div class="contact_form-div contact_form-area">
                            <label for="message" class="contact_form-tag">Message</label>
                            <textarea name="message" id="" cols="30" rows="10" class="contact_form-input"></textarea>
                        </div>

                        <button class="button g-recaptcha"
                            data-sitekey="{{ config('services.recaptcha_v3.siteKey') }}" data-callback="onSubmit"
                            data-action="submitContact">Send Message</button>
                    </form>
                </div>
            </div>
        </section>
        </div>


    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer_container container increase-size-on-hover">
            <h1 class="footer_title">{{ $heroSections->name_title ?? 'Zeller Jim' }}</h1>

            <ul class="footer_list">
                <li>
                    <a href="#about" class="footer_link">About</a>
                </li>
                <li>
                    <a href="#services" class="footer_link">Services</a>
                </li>
                <li>
                    <a href="#work" class="footer_link">Projects</a>
                </li>
            </ul>

            <ul class="footer_social">
                @if ($socialLinks)
                    @foreach ($socialLinks as $socialLink)
                        <a href="{{ $socialLink->link }}" target="_blank" class="footer_social-link">
                            <i class='{{ $socialLink->icon_path }}'></i>
                        </a>
                    @endforeach
                @endif
            </ul>

            <span class="footer_copy"> Copyright@Jim</span>
        </div>
    </footer>

    <!--=============== SCROLLREVEAL ===============-->
    <script src="{{ URL::asset('assets/js/scrollreveal.min.js') }}"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="{{ URL::asset('assets/js/swiper-bundle.min.js') }}"></script>
    {{-- <script>
        // Get the full height of the document including overflow
        const bodyHeight = document.body.scrollHeight;
        const htmlHeight = document.documentElement.scrollHeight;

        // Use the greater value to ensure cross-browser compatibility
        const fullPageHeight = Math.max(bodyHeight, htmlHeight);

        // Set the height of the element directly using JavaScript
        document.querySelector('.gradient-background').style.height = `${fullPageHeight}px`;

        console.log('Full Page Height:', fullPageHeight);
        console.log('Body Height:', bodyHeight);
        console.log('Html Height:', htmlHeight);
    </script> --}}

    <!--=============== MIXITUP FILTER ===============-->
    <script src="{{ URL::asset('assets/js/mixitup.min.js') }}"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ URL::asset('/assets/js/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
