<x-app>

    <div class="gradient-background">
        <svg xmlns="http://www.w3.org/2000/svg">
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18  -8"
                        result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                </filter>
            </defs>
        </svg>    
        <div class="gradients-container">
            <div class="g1"></div>
            <div class="g2"></div>
            <div class="g3"></div>
            <div class="g4"></div>
            <div class="g5"></div>
            <div class="interactive"></div>
        </div>
    </div>

    <!-- ---------about--------- -->
    <div id="hero" class="shapedividers_com-5974">
        <div class="container">
            <div class="hero-text">
                <p>{{ $heroSections->occupation ?? 'Full Stack Developer'}}</p>
                <h1>Hi, I'm <span>{{ $heroSections->name_title ?? 'Zeller Jim'}}</span><br>{{ $heroSections->sub_title ?? 'template'}}</h1>
            </div>
        </div>
    </div>
    <div></div>
    <!-- ---------about--------- -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="{{ $abouts->image_path ?? ' '}}">
                </div>
                <div class="about-col-2">
                    <h1 class="sub-title">About Me</h1>
                    {{ $abouts->description ?? 'lorem ipsum'}}
                    <div class="tab-titles">
                        <p class="tab-links active-link" onclick="opentab('skills')">Skills</p>
                        <p class="tab-links" onclick="opentab('experience')">Experience</p>
                        <p class="tab-links" onclick="opentab('education')">Education</p>
                    </div>
                    <div class="tab-contents active-tab" id="skills">
                        <ul>
                            @foreach ($skillLists as $skill)
                                <li><span>{{ $skill->title ?? 'Java'}}</span><br>{{ $skill->description ?? 'I have decent experience with java'}}
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-contents" id="experience">
                        <ul>
                            @foreach ($experienceLists as $experience)
                                <li><span>{{ $experience->title ?? 'School'}}</span><br>{{ $experience->description ?? 'I went to this school'}}
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-contents" id="education">
                        <ul>
                            @foreach ($educationLists as $education)
                                <li><span>{{ $education->title ?? 'School again'}}</span><br>{{ $education->description ?? 'I went to this school'}}
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------services------------ -->
    
    <div id="services">
        <div class="container">
            <h1 class="sub-title">My Services</h1>
            <div class="services-list">
                @foreach ($services as $service)
                    <div>
                        <i class="{{ $service->icon_path }}"></i>
                        <h2>{{ $service->title ?? 'Web Development'}}</h2>
                        <p>{{ $service->description ?? 'I do web development'}}</p>
                        <a href="#">Learn more</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ------------portfolio------------ -->
    <div id="portfolio">
        <div class="container">
            <h1 class="sub-title">My Works</h1>
            <div class="work-list">
                @foreach ($portfolios as $portfolio)
                    <div class="work">
                        <img src="{{ $portfolio->image_path ?? ' '}}">
                        <div class="layer">
                            <h3>{{ $portfolio->title ?? 'Insert title'}}</h3>
                            <p>{{ $portfolio->description ?? 'Insert description'}}</p>
                            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="#" class="btn">See more</a>
        </div>
    </div>
    <!-- --------------------contact------------------------- -->
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="contact-left">
                    <h1 class="sub-title">Contact Me</h1>
                    <p><i class="fa-solid fa-envelope"></i> {{ $contacts->email ?? 'zellebustamante@gmail.com'}}</p>
                    <p><i class="fa-solid fa-square-phone"></i> {{ $contacts->phoneNumber ?? '09550725115'}}</p>
                    <div class="social-icons">
                        @foreach ($contactLinks as $contactLink)
                            <a href="{{ $contactLink->link }}"><i class="{{ $contactLink->icon_path }}"></i></a>
                        @endforeach
                    </div>
                    <a href="documents/my-cv.pdf" download class="btn btn2">Download CV</a>
                </div>
                
                <div class="contact-right">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <input type="text" name="name" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                        <textarea name="message" rows="6" placeholder="Your Message"></textarea>
                        <button type="submit" class="btn btn2">Submit</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
    {{-- Script for the about section tab-title selection --}}
    <script>
        var tablinks = document.getElementsByClassName("tab-links");
        var tabcontents = document.getElementsByClassName("tab-contents");

        function opentab(tabname) {
            for (tablink of tablinks) {
                tablink.classList.remove("active-link");
            }
            for (tabcontent of tabcontents) {
                tabcontent.classList.remove("active-tab");
            }
            event.currentTarget.classList.add("active-link");
            document.getElementById(tabname).classList.add("active-tab");
        };
    </script>
    {{-- Script for the mobile navigation bar --}}
    <script>
        var sidemenu = document.getElementById("sidemenu");

        function openmenu() {
            sidemenu.style.right = "0px";
        }

        function closemenu() {
            sidemenu.style.right = "-200px";
        }
    </script>
    {{-- Script for the parallax effect
    <script>
        let page = document.getElementById("about");

        window.addEventListener('scroll', () => {
            let value = window.scrollY;

            page.style.marginTop = value * -0.5 + 'px';
        })
    </script> --}}
</x-app>
