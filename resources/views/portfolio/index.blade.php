<x-app>
    <!-- ---------about--------- -->
    <div id="hero">
        <div class="container">
            <div class="hero-text">
                <p>{{ $heroSections->occupation }}</p>
                <h1>Hi, I'm <span>{{ $heroSections->name_title }}</span><br>{{ $heroSections->sub_title }}</h1>
            </div>
        </div>
    </div>
    <!-- ---------about--------- -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="{{ $abouts->image_path }}">
                </div>
                <div class="about-col-2">
                    <h1 class="sub-title">About Me</h1>
                    {{ $abouts->description }}
                    <div class="tab-titles">
                        <p class="tab-links active-link" onclick="opentab('skills')">Skills</p>
                        <p class="tab-links" onclick="opentab('experience')">Experience</p>
                        <p class="tab-links" onclick="opentab('education')">Education</p>
                    </div>
                    <div class="tab-contents active-tab" id="skills">
                        <ul>
                            @foreach ($skillLists as $skill)
                                <li><span>{{ $skill->title }}</span><br>{{ $skill->description }}
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-contents" id="experience">
                        <ul>
                            @foreach ($experienceLists as $experience)
                                <li><span>{{ $experience->title }}</span><br>{{ $experience->description }}
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-contents" id="education">
                        <ul>
                            @foreach ($educationLists as $education)
                                <li><span>{{ $education->title }}</span><br>{{ $education->description }}
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
                    <i class="{{$service->icon_path}}"></i>
                    <h2>{{$service->title}}</h2>
                    <p>{{$service->description}}</p>
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
                    <img src="{{$portfolio->image_path}}">
                    <div class="layer">
                        <h3>{{$portfolio->title}}</h3>
                        <p>{{$portfolio->description}}</p>
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
                    <p><i class="fa-solid fa-envelope"></i> hazuza@gmail.com</p>
                    <p><i class="fa-solid fa-square-phone"></i> 09550725115</p>
                    <div class="social-icons">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-square-x-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-reddit"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                    <a href="documents/my-cv.pdf" download class="btn btn2">Download CV</a>
                </div>
                <div class="contact-right">
                    <form action="">
                        <input type="text" name="Name" placeholder="Your Name" required>
                        <input type="email" name="Email" placeholder="Your Email" required>
                        <textarea name="Message" rows="6" placeholder="Your Message"></textarea>
                        <button type="submit" class="btn btn2">Submit</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="copyright">
            Copyright @ Zeller Jane Bustamante
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
    {{-- Script for the parallax effect --}}
    {{-- <script>
        let page = document.getElementById("about");

        window.addEventListener('scroll', () => {
            let value = window.scrollY;

            page.style.marginTop = value * -0.5 + 'px';
        })
    </script> --}}
</x-app>
