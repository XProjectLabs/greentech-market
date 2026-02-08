<style>
        body {
            background: radial-gradient(circle at top, #0f3d2e, #061c16);
            color: #ffffff;
            font-family: 'Inter', sans-serif;
        }

        .grid-bg {
            background-image:
                linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .badge-green {
            background-color: rgba(183, 255, 90, 0.15);
            color: #b7ff5a;
            border: 1px solid rgba(183, 255, 90, 0.4);
        }

        .btn-green {
            background: #b7ff5a;
            color: #062e21;
            font-weight: 600;
            border-radius: 12px;
            padding: 10px 18px;
        }

        .btn-green:hover {
            background: #a6f94a;
            color: #062e21;
        }

        .btn-outline-green {
            border: 1px solid #b7ff5a;
            color: #b7ff5a;
            border-radius: 12px;
            padding: 10px 18px;
        }

        .btn-outline-green:hover {
            background: #b7ff5a;
            color: #062e21;
        }

        footer {
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        /* ============================= */
        /* PRODUCT LIST FIX (NEW STYLES) */
        /* ============================= */

        .latest-products {
            padding: 80px 0;
        }

        .text-muted-green {
            color: rgba(183, 255, 90, 0.7);
        }

        .product-card-natural {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .product-card-natural:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.35);
        }

        .product-img {
            background: #ffffff;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

        .product-img img {
            max-height: 160px;
            max-width: 100%;
            object-fit: contain;
        }

        .product-body {
            padding: 20px;
            text-align: center;
        }

        .product-body h6 {
            font-weight: 600;
            margin-bottom: 6px;
        }

        .product-body .category {
            font-size: 13px;
            color: rgba(183, 255, 90, 0.8);
            display: block;
            margin-bottom: 8px;
        }

        .product-body .price {
            font-weight: 700;
            font-size: 18px;
            color: #b7ff5a;
        }
    </style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark py-4">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="#">🌿 GreenTech Market</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto gap-4">
                <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="/catalogue">Boutique</a></li>
            </ul>
        </div>

        <a href="#" class="btn btn-outline-green ms-lg-3">Mon compte</a>
    </div>
</nav>