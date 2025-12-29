<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatsHome</title>
    <link href="https://fonts.googleapis.com/css2?family=Pecita&family=Aboreto&family=Poppins:wght@300;400;600&family=Linden+Hill&family=Abhaya+Libre:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="navbar">
        <div class="container">
            <div class="logo">Catshome</div>
            <nav>
                <ul class="nav-links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#our-cats">Our Cats</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <a href="{{ url('/admin/login') }}" class="btn-login">Login Admin</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer" id="contact">
        <div class="footer-content">
            <h2>BUILT BY PEOPLE, MADE FOR PEACE OF MIND</h2>
            <p>Through adoption, we help them find that special place — where comfort, love, and belonging come together.</p>
            <img src="{{ asset('gambar/footer.png') }}" alt="Cat illustration" class="footer-img">

            <div class="footer-bottom">
                <div class="footer-left">
                    <div class="footer-box">
                        <h3>CATSHOME.</h3>
                        <p>Follow us on:</p>
                        <div class="social-links">
                            <img src="{{ asset('gambar/instagram.png') }}" alt="Instagram">
                            <img src="{{ asset('gambar/facebook.png') }}" alt="Facebook">
                            <img src="{{ asset('gambar/twitter.png') }}" alt="Twitter">
                        </div>
                    </div>
                </div>

                <div class="footer-links">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#our-cats">Our Cats</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/cat-modal.js') }}"></script>
</body>
</html>