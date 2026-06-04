<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 450px;
            width: 100%;
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

        h1 {
            font-size: 28px;
            margin-bottom: 15px;
            color: #333;
            font-weight: 700;
        }

        .page-subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: all 0.3s ease;
            background: white;
        }

        input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        input:hover {
            border-color: #667eea;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.15);
        }

        .note {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
            font-weight: 400;
        }

        .comments {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            min-height: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        button:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        button:active {
            transform: translateY(-1px);
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #666;
        }

        .footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border-bottom: 2px solid #667eea;
            padding-bottom: 2px;
        }

        .footer a:hover {
            color: #764ba2;
            border-color: #764ba2;
        }

        @media (max-width: 480px) {
            .page-card {
                padding: 30px 20px;
            }

            h1 {
                font-size: 24px;
            }

            body {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-card">
            <h1>Créer un compte</h1>
            <p class="page-subtitle">Remplissez ce formulaire pour vous inscrire et accéder à votre espace.</p>
            <form action="" method="post" id="inscript-form">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur">
                    <p class="comments"></p>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
                    <p class="comments"></p>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirmer le mot de passe</label>
                    <input type="password" id="confirm-pass" name="confirm-password" placeholder="Confirmez votre mot de passe">
                    <p class="comments"></p>
                    <div class="note">Assurez-vous que les deux mots de passe correspondent.</div>
                </div>
                <button type="submit">✅ S'inscrire</button>
            </form>
            <div class="footer"><p>Déjà inscrit ? <a href="index.php">Connectez-vous ici</a></p></div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>