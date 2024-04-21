<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio 1</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/377fd11c1f.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="header">
    <div class="container">
        {{------- Navigation Bar ------}}
        <nav>
            <img src="images/logo.png" class="logo">
            <ul id="sidemenu">
                <li><a href="#header">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
                <i class="fa-solid fa-xmark" onclick="closemenu()"></i>
            </ul>
            <i class="fa-solid fa-bars" onclick="openmenu()"></i>
        </nav>

        {{------- Hero Section ------}}
        <div class="header-text">
            <p>UI/UX Designer</p>
            <h1>Hi, I'm <span>Jhon Doe</span><br>from Luzon Visayas<br>Mindanao</h1>
        </div>
    </div>
</div>    
<!-- ---------about--------- -->
<div id="about">
    <div class="container">
        <div class="row">
            <div class="about-col-1">
                <img src="images/user.png">
            </div>
            <div class="about-col-2">
                <h1 class="sub-title">About Me</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro aspernatur 
                iusto labore est necessitatibus quibusdam tempore vitae, ratione illum nobis,
                culpa laudantium reiciendis iure animi ducimus exercitationem! Distinctio, quidem sunt!</p>
            
                <div class="tab-titles">
                    <p class="tab-links active-link" onclick="opentab('skills')">Skills</p>
                    <p class="tab-links" onclick="opentab('experience')">Experience</p>
                    <p class="tab-links" onclick="opentab('education')">Education</p>
                </div>
                <div class="tab-contents active-tab" id="skills">
                    <ul>
                        <li><span>UI/UX</span><br>Designing Web/App interfaces</li>
                        <li><span>Web Development</span><br>Web app Development</li>
                        <li><span>App Development</span><br>App development</li>
                    </ul>
                </div>
                <div class="tab-contents" id="experience">
                    <ul>
                        <li><span>2020 - cuurre</span><br>Insert Something in here</li>
                        <li><span>2022 - 2025</span><br>Insert experience gained or something</li>
                        <li><span>2024 - 1997</span><br>Wowzersss</li>
                    </ul>
                </div>
                <div class="tab-contents" id="education">
                    <ul>
                        <li><span>2021</span><br>Schoooollll</li>
                        <li><span>2023</span><br>sheeeesshh</li>
                        <li><span>2025</span><br>In da future</li>
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
            <div>
                <i class="fa-solid fa-code"></i>
                <h2>Web Design</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis at aspernatur cumque ut sapiente iure, soluta quam aliquam qui voluptates sed ipsum 
                nemo magnam assumenda vel excepturi. Laborum, animi facilis!</p>
                <a href="#">Learn more</a>
            </div>
            <div>
                <i class="fa-brands fa-figma"></i>
                <h2>Game Design</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis at aspernatur cumque ut sapiente iure, soluta quam aliquam qui voluptates sed ipsum 
                nemo magnam assumenda vel excepturi. Laborum, animi facilis!</p>
                <a href="#">Learn more</a>
            </div>
            <div>
                <i class="fa-solid fa-ghost"></i>
                <h2>App Design</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis at aspernatur cumque ut sapiente iure, soluta quam aliquam qui voluptates sed ipsum 
                nemo magnam assumenda vel excepturi. Laborum, animi facilis!</p>
                <a href="#">Learn more</a>
            </div>
        </div>  
    </div>
</div>
<!-- ------------portfolio------------ -->
<div id="portfolio">
    <div class="container">
        <h1 class="sub-title">My Works</h1>
        <div class="work-list">
            <div class="work">
                <img src="images/work-1.png">
                <div class="layer">
                    <h3>Social Media App</h3>
                    <p>something something something something blah blash blah blahss</p>
                    <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="work">
                <img src="images/work-2.png">
                <div class="layer">
                    <h3>Something something</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ipsa, voluptatum aliquid tenetur ea sequi error molestias blanditiis nisi repudiandae unde expedita voluptas similique delectus labore alias tempora velit optio.</p>
                    <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="work">
                <img src="images/work-3.png">
                <div class="layer">
                    <h3>Wooooww</h3>
                    <p>something something something something blah blash blah blahss</p>
                    <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
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
                </div>
                <a href="images/my-cv.pdf" download class="btn btn2">Download CV</a>
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


<script>

    var tablinks = document.getElementsByClassName("tab-links");
    var tabcontents = document.getElementsByClassName("tab-contents");

    function opentab(tabname){
      for(tablink of tablinks){
        tablink.classList.remove("active-link");
      }
      for(tabcontent of tabcontents){
        tabcontent.classList.remove("active-tab");
      }
      event.currentTarget.classList.add("active-link");
      document.getElementById(tabname).classList.add("active-tab");
    };

</script>

<script>

    var sidemenu = document.getElementById("sidemenu");

    function openmenu(){
        sidemenu.style.right = "0px";
    }
    function closemenu(){
        sidemenu.style.right = "-200px";
    }

</script>

<script>

    let page = document.getElementById("about");

    window.addEventListener('scroll', () =>{
        let value = window.scrollY;

        page.style.marginTop = value * -0.5 + 'px';
    })

</script>
</body>
</html>