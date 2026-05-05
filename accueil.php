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
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .page-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .accueil-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #ddd;
        }

        .header-logo {
            flex: 0 0 auto;
        }

        .header-logo img {
            height: 100px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .header-logo a {
            display: inline-block;
            text-decoration: none;
        }

        .header-logo img:hover {
            transform: scale(1.05);
        }

        .header-title {
            flex: 1;
            text-align: center;
        }

        .header-title h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 10px;
        }

        .header-title p {
            color: #666;
            font-size: 14px;
        }

        .accueil-nav {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .nav-link {
            display: block;
            padding: 15px 20px;
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 6px;
            text-decoration: none;
            color: #333;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: #333;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .welcome-card {
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            color: #666;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .accueil-header {
                flex-direction: column;
                gap: 15px;
            }

            .header-logo img {
                height: 80px;
            }

            .header-title h1 {
                font-size: 24px;
            }

            .accueil-nav {
                grid-template-columns: 1fr;
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
                    Utilisez les liens ci-dessus pour accéder aux différentes sections: 
                    consultez la liste des utilisateurs, articles et clients, 
                    visualisez les ventes ou enregistrez une nouvelle transaction.
                </p>
            </section>
        </div>
    </div>
</body>
</html>
