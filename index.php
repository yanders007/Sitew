<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="fontawesome-free-7.1.0-web/css/all.css">
  <title>Connexion</title>
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
      text-align: center;
      margin-bottom: 30px;
      font-size: 28px;
      color: #333;
      font-weight: 700;
    }

    .login-input {
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
    }

    .login-input label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #333;
      font-size: 14px;
    }

    .login-input input {
      padding: 12px 15px;
      border: 2px solid #e0e0e0;
      border-radius: 8px;
      font-size: 15px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      transition: all 0.3s ease;
      background: white;
    }

    .login-input input:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
      transform: translateY(-2px);
    }

    .login-input input:hover {
      border-color: #667eea;
      box-shadow: 0 2px 8px rgba(102, 126, 234, 0.15);
    }

    .comments {
      color: #e74c3c;
      font-size: 12px;
      margin-top: 5px;
      min-height: 16px;
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 25px 0;
      font-size: 14px;
      gap: 15px;
    }

    .remember-forgot label {
      display: flex;
      align-items: center;
      margin: 0;
      font-weight: 400;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .remember-forgot label:hover {
      color: #667eea;
    }

    .remember-forgot input[type="checkbox"] {
      margin-right: 8px;
      width: 16px;
      height: 16px;
      cursor: pointer;
      accent-color: #667eea;
    }

    .remember-forgot a {
      color: #667eea;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      border-bottom: 2px solid #667eea;
      padding-bottom: 2px;
    }

    .remember-forgot a:hover {
      color: #764ba2;
      border-color: #764ba2;
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

    .new-login {
      text-align: center;
      margin-top: 25px;
      font-size: 14px;
      color: #666;
    }

    .new-login a {
      color: #667eea;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      border-bottom: 2px solid #667eea;
      padding-bottom: 2px;
    }

    .new-login a:hover {
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

      .remember-forgot {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
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
      <form action="" method="post" id="login-form">
        <h1>🔐 Connexion</h1>
        <div class="login-input">
          <label for="username">Nom d'utilisateur</label>
          <input type="text" name="username" id="username" placeholder="Entrez votre nom d'utilisateur">
          <p class="comments"></p>
        </div>
        <div class="login-input">
          <label for="password">Mot de passe</label>
          <input type="password" placeholder="Entrez votre mot de passe" name="password" id="password">
          <p class="comments"></p>
        </div>
        <div class="remember-forgot">
          <label>
            <input type="checkbox">Se souvenir de moi
          </label>
          <a href="#">Mot de passe oublié?</a>
        </div>
        <button type="submit">✅ Se connecter</button>
        <div class="new-login">
          <p>Pas de compte ? <a href="inscription.php">S'inscrire ici</a></p>
        </div>
      </form>
    </div>
  </div>
  <script src="index.js"></script>
</body>
</html>