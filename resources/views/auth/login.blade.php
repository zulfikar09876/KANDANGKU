<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - KANDANGKU</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #10b981, #3b82f6);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        
        .login-container {
            width: 100%;
            max-width: 400px;
            position: relative;
        }
        
        .floating-element {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-element:nth-child(2) { animation-delay: 2s; }
        .floating-element:nth-child(3) { animation-delay: 4s; }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #10b981, #3b82f6);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        }
        
        .form-input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.5);
            background: rgba(255, 255, 255, 0.15);
        }
        
        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .form-label {
            color: white;
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .text-white { color: white; }
        .text-center { text-align: center; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        .mb-8 { margin-bottom: 2rem; }
        .mt-4 { margin-top: 1rem; }
        .mt-6 { margin-top: 1.5rem; }
        
        .font-bold { font-weight: 700; }
        .text-4xl { font-size: 2.25rem; }
        .text-2xl { font-size: 1.5rem; }
        .text-sm { font-size: 0.875rem; }
        
        .error-message {
            color: #fca5a5;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
        
        .link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .link:hover {
            color: white;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .checkbox {
            margin-right: 0.5rem;
        }
        
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Floating Elements -->
    <div class="floating-element" style="width: 80px; height: 80px; top: 10%; left: 10%;"></div>
    <div class="floating-element" style="width: 60px; height: 60px; top: 20%; right: 15%;"></div>
    <div class="floating-element" style="width: 100px; height: 100px; bottom: 20%; left: 20%;"></div>

    <div class="login-container">
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="/" class="text-4xl font-bold text-white">🐐 KANDANGKU</a>
            <p class="text-white opacity-80 mt-2">Sistem Manajemen Kandang Kambing</p>
        </div>

        <!-- Login Form -->
        <div class="glass">
            <h2 class="text-2xl font-bold text-white text-center mb-6">🔑 Login</h2>
            
    <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">{{ session('status') }}</div>
            @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">📧 Email</label>
                    <input id="email" 
                           class="form-input" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           placeholder="Masukkan email Anda"
                           required 
                           autofocus 
                           autocomplete="username" />
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
        </div>

        <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">🔒 Password</label>
                    <input id="password" 
                           class="form-input" 
                            type="password"
                            name="password"
                           placeholder="Masukkan password Anda"
                           required 
                           autocomplete="current-password" />
                    @error('password')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
        </div>

        <!-- Remember Me -->
                <div class="checkbox-container">
                    <input id="remember_me" 
                           type="checkbox" 
                           class="checkbox" 
                           name="remember">
                    <label for="remember_me" class="text-white text-sm">Ingat saya</label>
        </div>

            @if (Route::has('password.request'))
                    <div class="text-center mb-6">
                        <a class="link text-sm" href="{{ route('password.request') }}">
                            Lupa password?
                </a>
                    </div>
            @endif

                <button type="submit" class="btn-primary">
                    🚀 Login
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-white opacity-80 text-sm">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="link font-semibold">Daftar sekarang</a>
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="/" class="link text-sm">
                ← Kembali ke halaman utama
            </a>
        </div>
    </div>

    <script>
        // Add ripple effect to buttons
        function createRipple(event) {
            const button = event.currentTarget;
            const ripple = document.createElement('span');
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left - size / 2;
            const y = event.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            button.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        }

        // Add ripple effect to login button
        document.addEventListener('DOMContentLoaded', () => {
            const loginButton = document.querySelector('.btn-primary');
            if (loginButton) {
                loginButton.addEventListener('click', createRipple);
            }
        });

        // Form validation feedback
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });
        });
    </script>
</body>
</html>
