<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - GreenTech Market</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a4d2e 0%, #2d5f3f 100%);
            min-height: 100vh;
            padding: 20px;
        }

        /* Navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            margin-bottom: 40px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
        }

        .logo::before {
            content: "🌱";
            font-size: 28px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #a8e063;
        }

        .profile-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 2px solid #e0e0e0;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #a8e063 0%, #8bc34a 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            margin: 0 auto 20px;
            box-shadow: 0 10px 30px rgba(168, 224, 99, 0.3);
        }

        .profile-name {
            font-size: 32px;
            font-weight: 700;
            color: #1a4d2e;
            margin-bottom: 5px;
        }

        .profile-email {
            color: #666;
            font-size: 16px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }

        .info-card {
            background: #f9f9f9;
            padding: 25px;
            border-radius: 15px;
            border-left: 4px solid #a8e063;
        }

        .info-label {
            font-size: 13px;
            color: #999;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .actions {
            display: flex;
            gap: 15px;
        }

        .btn {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary {
            background: #1a4d2e;
            color: #fff;
        }

        .btn-primary:hover {
            background: #2d5f3f;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #e74c3c;
            color: #fff;
        }

        .btn-danger:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid #ddd;
            color: #666;
        }

        .btn-secondary:hover {
            background: #f5f5f5;
            border-color: #bbb;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }

            .profile-card {
                padding: 30px 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="logo">GreenTech Market</div>
        <div class="nav-links">
            <a href="{{ route('home') }}">Accueil</a>
            <a href="{{ route('products.index') }}">Boutique</a>
            <a href="{{ route('profile') }}">Mon compte</a>
        </div>
    </nav>

    <div class="profile-container">
        <div class="profile-card">
            
            @if(session('success'))
                <div class="success-message">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-avatar">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <h1 class="profile-name">{{ $user->name }}</h1>
                <p class="profile-email">{{ $user->email }}</p>
            </div>

            <!-- Info Grid -->
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-label">Nom complet</div>
                    <div class="info-value">{{ $user->name }}</div>
                </div>

                <div class="info-card">
                    <div class="info-label">Email</div>
                    <div class="info-value">{{ $user->email }}</div>
                </div>

                <div class="info-card">
                    <div class="info-label">Membre depuis</div>
                    <div class="info-value">{{ $user->created_at->format('d/m/Y') }}</div>
                </div>

                <div class="info-card">
                    <div class="info-label">Statut</div>
                    <div class="info-value" style="color: #28a745;">✓ Compte actif</div>
                </div>
            </div>

            <!-- Actions -->
            <div class="actions">
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    🏠 Accueil
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    🛒 Boutique
                </a>
                <form action="{{ route('logout') }}" method="POST" style="flex: 1;">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="width: 100%;">
                        🚪 Se déconnecter
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>