<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat's Home Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">
</head>
<body>
    <div class="login-container">
        <a href="{{ url('/') }}" class="back-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
        </a>

        <div class="left-panel">
            <div class="illustration-box">
                <p class="admin-title">CATSHOMEADMIN</p>
                <img src="{{ asset('gambar/login_page.png') }}" alt="Ilustrasi seorang wanita membelai kucing" class="cat-illustration">
            </div>
        </div>

        <div class="right-panel">
            <h1 class="login-header">LOGIN</h1>
            <p class="welcome-text">welcome back!</p>
            
            <form action="{{ url('/admin/dashboard') }}" method="POST" id="loginForm">
                @csrf
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                
                <button type="submit" class="login-button">Login</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Login berhasil! Mengarahkan ke Dashboard Admin...');
            window.location.href = "{{ url('/admin/dashboard') }}"; 
        });
    </script>
</body>
</html>
