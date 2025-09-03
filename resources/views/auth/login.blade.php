<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * { box-sizing: border-box; }
        
        body { 
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0; 
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        
        .container { 
            max-width: 400px; 
            width: 100%;
            background: rgba(255, 255, 255, 0.95); 
            padding: 2.5rem; 
            border-radius: 1rem; 
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo h1 {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
        }
        
        .subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 2rem;
            font-size: 0.875rem;
        }
        
        .field { 
            margin-bottom: 1.5rem; 
        }
        
        label { 
            display: block; 
            margin-bottom: 0.5rem; 
            font-weight: 600;
            color: #374151;
            font-size: 0.875rem;
        }
        
                 input[type="email"], input[type="password"] { 
             width: 100%; 
             padding: 0.875rem 1rem; 
             border: 2px solid #e5e7eb; 
             border-radius: 0.75rem; 
             font-size: 1rem;
             transition: all 0.2s ease;
             background: #f9fafb;
             color: #374151;
             -webkit-text-fill-color: #374151;
             font-family: inherit;
         }
         
         input[type="email"]::placeholder, input[type="password"]::placeholder {
             color: #9ca3af;
             opacity: 1;
         }
        
                 input[type="email"]:focus, input[type="password"]:focus { 
             outline: none;
             border-color: #667eea;
             background: white;
             box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
             color: #374151;
             -webkit-text-fill-color: #374151;
         }
        
        .actions { 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .btn { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; 
            border: none; 
            padding: 0.875rem 2rem; 
            border-radius: 0.75rem; 
            cursor: pointer; 
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px 0 rgba(102, 126, 234, 0.4);
        }
        
        .btn:hover { 
            transform: translateY(-2px);
            box-shadow: 0 8px 25px 0 rgba(102, 126, 234, 0.4);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .checkbox { 
            display: flex; 
            align-items: center; 
            gap: 0.5rem;
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .checkbox input[type="checkbox"] {
            width: auto;
            margin: 0;
        }
        
        .error { 
            color: #dc2626; 
            font-size: 0.75rem; 
            margin-top: 0.5rem;
            display: block;
        }
        
        .alert { 
            background: #fef2f2; 
            color: #991b1b; 
            padding: 1rem; 
            border-radius: 0.75rem; 
            margin-bottom: 1.5rem;
            border: 1px solid #fecaca;
            font-size: 0.875rem;
        }
        
        .alert ul {
            margin: 0;
            padding-left: 1.25rem;
        }
        
        .links {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }
        
        .links a { 
            color: #667eea; 
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        
        .links a:hover { 
            color: #5a67d8;
        }
        
        .forgot-password {
            text-align: center;
            margin-top: 1rem;
        }
        
        .forgot-password a {
            color: #6b7280;
            text-decoration: none;
            font-size: 0.875rem;
        }
        
        .forgot-password a:hover {
            color: #374151;
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 2rem 1.5rem;
                margin: 1rem;
            }
            
            .actions {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if (app()->environment('local'))
        <script>window.Laravel = { csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content') };</script>
    @endif
    <link rel="icon" href="/favicon.ico">
    <meta name="robots" content="noindex">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <meta name="X-UA-Compatible" content="IE=edge">
    <meta name="referrer" content="same-origin">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="theme-color" content="#0ea5e9">
    <meta name="description" content="Login">
    
</head>
<body>
    <main class="container">
        <div class="logo">
            <h1>Welcome Back</h1>
            <p class="subtitle">Sign in to your account to continue</p>
        </div>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" id="loginForm">
            @csrf

            <div class="field">
                <label for="email">Email Address</label>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    autocomplete="email"
                    placeholder="Enter your email"
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input 
                    id="password" 
                    name="password" 
                    type="password" 
                    required 
                    autocomplete="current-password"
                    placeholder="Enter your password"
                >
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="actions">
                <label class="checkbox">
                    <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                    <span>Remember me</span>
                </label>
                <button type="submit" class="btn" id="submitBtn">
                    <span class="btn-text">Sign In</span>
                    <span class="btn-loading" style="display: none;">Signing in...</span>
                </button>
            </div>
        </form>

        <div class="links">
            <div class="forgot-password">
                <a href="{{ url('/forgot-password') }}">Forgot your password?</a>
            </div>
            <p style="margin-top: 1rem; font-size: 0.875rem; color: #6b7280;">
                Don't have an account? 
                <a href="{{ url('/register') }}">Create one here</a>
            </p>
        </div>
    </main>

    <script>
        // Add loading state to form submission
        document.getElementById('loginForm').addEventListener('submit', function() {
            const submitBtn = document.getElementById('submitBtn');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoading = submitBtn.querySelector('.btn-loading');
            
            submitBtn.disabled = true;
            btnText.style.display = 'none';
            btnLoading.style.display = 'inline';
        });

        // Add input focus effects
        const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
        });
    </script>
</body>
</html>


