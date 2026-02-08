<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - GreenTech Market</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 450px;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-icon {
            font-size: 60px;
            margin-bottom: 10px;
        }

        .logo-text {
            font-size: 28px;
            font-weight: 700;
            color: #1a4d2e;
        }

        .welcome-text {
            text-align: center;
            margin-bottom: 35px;
        }

        .welcome-text h1 {
            font-size: 24px;
            color: #1a4d2e;
            margin-bottom: 8px;
        }

        .welcome-text p {
            color: #666;
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #999;
        }

        .form-input {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s;
            color: #333;
        }

        .form-input:focus {
            outline: none;
            border-color: #a8e063;
            background: #f9fff9;
        }

        .form-input.error {
            border-color: #e74c3c;
        }

        .error-message {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .password-requirements {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            line-height: 1.5;
        }

        .btn-register {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #a8e063 0%, #8bc34a 100%);
            border: none;
            border-radius: 12px;
            color: #1a4d2e;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 25px;
            margin-bottom: 20px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(168, 224, 99, 0.4);
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: #e0e0e0;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 15px;
            color: #999;
            font-size: 14px;
            position: relative;
            z-index: 1;
        }

        .login-link {
            text-align: center;
            color: #666;
            font-size: 15px;
        }

        .login-link a {
            color: #2c5530;
            text-decoration: none;
            font-weight: 700;
        }

        .login-link a:hover {
            color: #a8e063;
        }

        .back-home {
            text-align: center;
            margin-top: 20px;
        }

        .back-home a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .back-home a:hover {
            color: #a8e063;
        }

        .terms {
            font-size: 13px;
            color: #666;
            text-align: center;
            margin-top: 15px;
            line-height: 1.5;
        }

        .terms a {
            color: #2c5530;
            text-decoration: none;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .register-card {
                padding: 40px 25px;
            }

            .welcome-text h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="register-card">
            <!-- Logo -->
            <div class="logo">
                <div class="logo-icon">🌱</div>
                <div class="logo-text">GreenTech Market</div>
            </div>

            <!-- Welcome Text -->
            <div class="welcome-text">
                <h1>Créer un compte</h1>
                <p>Rejoignez notre communauté éco-responsable</p>
            </div>

            <!-- Register Form -->
            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <div class="input-wrapper">
                        <span class="input-icon">👤</span>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               class="form-input {{ $errors->has('name') ? 'error' : '' }}"
                               value="{{ old('name') }}"
                               placeholder="Votre nom complet"
                               required
                               autofocus>
                    </div>
                    @error('name')
                        <div class="error-message">⚠️ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <div class="input-wrapper">
                        <span class="input-icon">📧</span>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="form-input {{ $errors->has('email') ? 'error' : '' }}"
                               value="{{ old('email') }}"
                               placeholder="votre.email@exemple.com"
                               required>
                    </div>
                    @error('email')
                        <div class="error-message">⚠️ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-input {{ $errors->has('password') ? 'error' : '' }}"
                               placeholder="Minimum 8 caractères"
                               required>
                    </div>
                    <div class="password-requirements">
                        Minimum 8 caractères
                    </div>
                    @error('password')
                        <div class="error-message">⚠️ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               class="form-input"
                               placeholder="Retapez votre mot de passe"
                               required>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-register">
                    Créer mon compte
                </button>

                <!-- Terms -->
                <div class="terms">
                    En créant un compte, vous acceptez nos 
                    <a href="#">Conditions d'utilisation</a> et notre 
                    <a href="#">Politique de confidentialité</a>
                </div>
            </form>

            <!-- Divider -->
            <div class="divider">
                <span>ou</span>
            </div>

            <!-- Login Link -->
            <div class="login-link">
                Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter</a>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="back-home">
            <a href="{{ route('home') }}">← Retour à l'accueil</a>
        </div>
    </div>

</body>
</html>