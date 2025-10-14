<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - KANDANGKU</title>
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
        
        .register-container {
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

    <div class="register-container">
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="/" class="text-4xl font-bold text-white">🐐 KANDANGKU</a>
            <p class="text-white opacity-80 mt-2">Sistem Manajemen Kandang Kambing</p>
        </div>

        <!-- Register Form -->
        <div class="glass">
            <h2 class="text-2xl font-bold text-white text-center mb-6">🚀 Daftar Akun</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">👤 Nama Lengkap</label>
                    <input id="name" 
                           class="form-input" 
                           type="text" 
                           name="name" 
                           value="{{ old('name') }}" 
                           placeholder="Masukkan nama lengkap Anda"
                           required 
                           autofocus 
                           autocomplete="name" />
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
        </div>

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
                           autocomplete="new-password" />
                    @error('password')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
        </div>

        <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">🔒 Konfirmasi Password</label>
                    <input id="password_confirmation" 
                           class="form-input" 
                            type="password"
                           name="password_confirmation" 
                           placeholder="Konfirmasi password Anda"
                           required 
                           autocomplete="new-password" />
                    @error('password_confirmation')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-primary">
                    🚀 Daftar Sekarang
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-white opacity-80 text-sm">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="link font-semibold">Login di sini</a>
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

        // Add ripple effect to register button
        document.addEventListener('DOMContentLoaded', () => {
            const registerButton = document.querySelector('.btn-primary');
            if (registerButton) {
                registerButton.addEventListener('click', createRipple);
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

        // Password confirmation validation
        document.addEventListener('DOMContentLoaded', () => {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');
            
            function validatePassword() {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity('Password tidak cocok');
                } else {
                    confirmPassword.setCustomValidity('');
                }
            }
            
            password.addEventListener('change', validatePassword);
            confirmPassword.addEventListener('keyup', validatePassword);
        });
    </script>
</body>
</html>
