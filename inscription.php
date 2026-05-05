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
        }
        
        .container {
            max-width: 450px;
            margin: 30px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        h1 {
            font-size: 26px;
            margin-bottom: 15px;
            color: #333;
        }
        
        .container > p {
            color: #666;
            margin-bottom: 25px;
            font-size: 14px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        
        input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            font-family: inherit;
        }
        
        input:focus {
            outline: none;
            border-color: #333;
            box-shadow: 0 0 0 3px rgba(0,0,0,0.1);
        }
        
        .note {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #333;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
        }
        
        input[type="submit"]:hover {
            background: #555;
        }
        
        .comments {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }
        
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        
        .footer a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px solid #333;
        }
        
        .footer a:hover {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Créer un compte</h1>
        <p>Remplissez ce formulaire pour vous inscrire et accéder à votre espace.</p>
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
            <input type="submit" value="Inscription">
        </form>
        <div class="footer"><p>Déjà inscrit ?<a href="index.php">Connectez-vous sur la page de connexion</a></p></div>
    </div>
    <script src="script.js"></script>
</body>
</html>