<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | GreenTech Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-main: #0f172a;
            --bg-card: #111827;
            --text-main: #e5e7eb;
            --text-muted: #9ca3af;
            --accent: #22c55e;
            --danger: #ef4444;
        }

        body {
            background: var(--bg-main);
            font-family: 'DM Sans', sans-serif;
            color: var(--text-main);
            margin: 0;
        }

        .sidebar {
            position: fixed;
            width: 260px;
            height: 100vh;
            background: var(--bg-card);
            padding: 28px;
            border-right: 1px solid #1f2933;
        }

        .logo {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 48px;
        }

        .logo span { color: var(--accent); }

        .nav-link {
            display: block;
            padding: 14px 18px;
            border-radius: 12px;
            color: var(--text-muted);
            text-decoration: none;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .nav-link.active,
        .nav-link:hover {
            background: rgba(34,197,94,.12);
            color: var(--accent);
        }

        .main-content {
            margin-left: 260px;
            padding: 36px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 24px;
        }

        .btn-add {
            background: var(--accent);
            color: #052e16;
            padding: 10px 20px;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            text-decoration: none;
        }

        /* Stats card */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 22px;
            margin-bottom: 36px;
        }

        .stat-card {
            background: #1f2937;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
        }

        .stat-label { font-size: 13px; color: var(--text-muted); margin-bottom: 8px; text-transform: uppercase; }
        .stat-value { font-size: 28px; font-weight: 700; color: var(--accent); }

        /* Table */
.table-container {
    background: var(--bg-card);
    border-radius: 22px;
    padding: 28px;
    border: 1px solid #1f2937;
    margin-top: 30px;
}

.table-container table {
    width: 100%;
    border-collapse: collapse;
}

.table-container th {
    font-size: 12px;
    color: var(--text-muted);
    text-transform: uppercase;
    padding: 14px;
    border-bottom: 1px solid #1f2937;
}

.table-container td {
    padding: 18px 14px;
    border-bottom: 1px solid #1f2937;
    vertical-align: middle;
    text-align: center;
}

.price {
    font-weight: 700;
    color: var(--accent);
}

.product-img {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    object-fit: cover;
}

.btn-action {
    background: none;
    border: none;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 8px;
}

.btn-edit {
    color: #38bdf8;
}

.btn-delete {
    color: var(--danger);
}

.btn-edit:hover,
.btn-delete:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>

<aside class="sidebar">
    <div class="logo">Green<span>Tech</span> Admin</div>
    <a class="nav-link" href="{{ route('admin.dashboard') }}">Tableau de bord</a>
    <a class="nav-link" href="{{ route('admin.products') }}">Produits</a>
    <a class="nav-link" href="{{ route('admin.users') }}">Utilisateurs</a>
    <a class="nav-link" href="#">Déconnexion</a>
</aside>

<main class="main-content">
    @yield('content')
</main>

</body>
</html>
