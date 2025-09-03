<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Welcome Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * { box-sizing: border-box; }
        
        body { 
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0; 
            min-height: 100vh;
            color: #374151;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .user-name {
            font-weight: 600;
            color: #374151;
        }
        
        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(102, 126, 234, 0.3);
        }
        
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(102, 126, 234, 0.4);
        }
        
        .btn-secondary {
            background: #6b7280;
            box-shadow: 0 2px 4px rgba(107, 114, 128, 0.3);
        }
        
        .btn-secondary:hover {
            box-shadow: 0 4px 8px rgba(107, 114, 128, 0.4);
        }
        
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .welcome-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .welcome-title {
            font-size: 2rem;
            font-weight: 700;
            margin: 0 0 0.5rem 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .welcome-subtitle {
            color: #6b7280;
            font-size: 1.1rem;
            margin: 0 0 1.5rem 0;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.2s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
        }
        
        .stat-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: #6b7280;
            margin: 0 0 0.5rem 0;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #374151;
            margin: 0;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .action-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 0.75rem;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.2s ease;
            text-decoration: none;
            color: inherit;
        }
        
        .action-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .action-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        
        .action-title {
            font-weight: 600;
            margin: 0 0 0.5rem 0;
            color: #374151;
        }
        
        .action-description {
            font-size: 0.875rem;
            color: #6b7280;
            margin: 0;
        }
        
        @media (max-width: 768px) {
            .header-content {
                padding: 0 1rem;
                flex-direction: column;
                gap: 1rem;
            }
            
            .main-content {
                padding: 1rem;
            }
            
            .welcome-card {
                padding: 1.5rem;
            }
            
            .welcome-title {
                font-size: 1.5rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if (app()->environment('local'))
        <script>window.Laravel = { csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content') };</script>
    @endif
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="logo">Dashboard</div>
            <div class="user-menu">
                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="user-name">{{ auth()->user()->name }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="welcome-card">
            <h1 class="welcome-title">Welcome back, {{ auth()->user()->name }}! 👋</h1>
            <p class="welcome-subtitle">Here's what's happening with your account today.</p>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <h3 class="stat-title">Profile Views</h3>
                    <p class="stat-value">1,234</p>
                </div>
                <div class="stat-card">
                    <h3 class="stat-title">Messages</h3>
                    <p class="stat-value">42</p>
                </div>
                <div class="stat-card">
                    <h3 class="stat-title">Tasks Completed</h3>
                    <p class="stat-value">8</p>
                </div>
                <div class="stat-card">
                    <h3 class="stat-title">Projects</h3>
                    <p class="stat-value">3</p>
                </div>
            </div>
        </div>

        <div class="actions-grid">
            <a href="#" class="action-card">
                <div class="action-icon">👤</div>
                <h3 class="action-title">Profile Settings</h3>
                <p class="action-description">Update your personal information and preferences</p>
            </a>
            
            <a href="#" class="action-card">
                <div class="action-icon">📊</div>
                <h3 class="action-title">Analytics</h3>
                <p class="action-description">View detailed reports and insights</p>
            </a>
            
            <a href="#" class="action-card">
                <div class="action-icon">⚙️</div>
                <h3 class="action-title">Settings</h3>
                <p class="action-description">Configure your account and application settings</p>
            </a>
            
            <a href="#" class="action-card">
                <div class="action-icon">📞</div>
                <h3 class="action-title">Support</h3>
                <p class="action-description">Get help and contact our support team</p>
            </a>
        </div>
    </main>

    <script>
        // Add some interactive features
        document.addEventListener('DOMContentLoaded', function() {
            // Add click handlers for action cards
            const actionCards = document.querySelectorAll('.action-card');
            actionCards.forEach(card => {
                card.addEventListener('click', function(e) {
                    e.preventDefault();
                    // You can add specific functionality here
                    console.log('Action clicked:', this.querySelector('.action-title').textContent);
                });
            });
        });
    </script>
</body>
</html>
