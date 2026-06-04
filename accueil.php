<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - ENEAM</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .page-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            background: white;
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .accueil-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 3px solid #e0e0e0;
        }

        .header-logo {
            flex: 0 0 auto;
        }

        .header-logo img {
            height: 110px;
            width: auto;
            transition: transform 0.4s ease, filter 0.4s ease;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        }

        .header-logo a {
            display: inline-block;
            text-decoration: none;
        }

        .header-logo img:hover {
            transform: scale(1.08) rotate(2deg);
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.15));
        }

        .header-title {
            flex: 1;
            text-align: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 25px;
            border-radius: 10px;
            color: white;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .header-title h1 {
            font-size: 36px;
            color: white;
            margin-bottom: 8px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .header-title p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            font-weight: 300;
        }

        .accueil-nav {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .nav-link {
            display: block;
            padding: 20px;
            background-color: #93a7b9;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            font-size: 16px;
            box-shadow: 0 4px 15px rgba(245, 87, 108, 0.3);
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #45259c 0%, #3ca028 100%);
            transition: left 0.4s ease;
            z-index: -1;
        }

        .nav-link:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 8px 25px rgba(245, 87, 108, 0.5);
        }

        .nav-link:hover::before {
            left: 0;
        }

        .welcome-card {
            padding: 30px;
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            border: none;
            border-radius: 10px;
            color: #333;
            line-height: 1.8;
            font-size: 16px;
            box-shadow: 0 5px 15px rgba(252, 182, 159, 0.3);
            border-left: 5px solid #2f9a9e;
        }

        .welcome-card p {
            margin: 0;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .page-card {
                padding: 25px;
            }

            .accueil-header {
                flex-direction: column;
                gap: 20px;
                margin-bottom: 30px;
                padding-bottom: 20px;
            }

            .header-logo img {
                height: 85px;
            }

            .header-title {
                padding: 20px;
            }

            .header-title h1 {
                font-size: 28px;
            }

            .header-title p {
                font-size: 14px;
            }

            .accueil-nav {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .nav-link {
                padding: 18px;
                font-size: 15px;
            }

            .welcome-card {
                padding: 20px;
            }

            body {
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .header-title h1 {
                font-size: 24px;
            }

            .nav-link {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-card accueil-card">
            <header class="accueil-header">
                <div class="header-logo header-logo-left">
                    <a href="https://uac.bj" target="_blank">
                        <img src="uac.bj.png" alt="Logo UAC">
                    </a>
                </div>

                <div class="header-title">
                    <h1>Bienvenue dans ma plateforme</h1>
                    <p>Gestion complète des utilisateurs, articles, clients et ventes</p>
                </div>

                <div class="header-logo header-logo-right">
                    <a href="https://eneam.bj" target="_blank">
                        <img src="eneam.bj.png" alt="Logo ENEAM">
                    </a>
                </div>
            </header>

            <nav class="accueil-nav">
                <a href="listeutilisateur.php" class="nav-link">📋 Liste utilisateur</a>
                <a href="article.php" class="nav-link">📦 Liste article</a>
                <a href="voirclient.php" class="nav-link">👥 Liste client</a>
                <a href="listevente.php" class="nav-link">💰 Liste vente</a>
                <a href="effectuer_vente.php" class="nav-link">✅ Effectuer vente</a>
                <a href="index.php" class="nav-link">🚪 Déconnexion</a>
            </nav>

            <section class="welcome-card">
                <p>
                    👋 Bienvenue! Vous êtes connecté et prêt à utiliser la plateforme. 
                    </p>
            </section>
        </div>
    </div>
</body>
</html>
