<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio 1</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/377fd11c1f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="header" class="container">
        {{-- ----- Navigation Bar ---- --}}
        <nav>
            <img src="images/logo.png" class="logo">
            <ul id="sidemenu">
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
                <i class="fa-solid fa-xmark" onclick="closemenu()"></i>
            </ul>
            <i class="fa-solid fa-bars" onclick="openmenu()"></i>
        </nav>
    </div>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <div class="copyright">
            Copyright @ Zeller Jane Bustamante
        </div>
    </footer>
</body>

</html>
