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
    }
    
    form {
      max-width: 400px;
      margin: 50px auto;
      padding: 30px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    h1 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 24px;
      color: #333;
    }
    
    .login-input {
      margin-bottom: 20px;
    }
    
    .login-input label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #333;
    }
    
    .login-input input {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
    }
    
    .login-input input:focus {
      outline: none;
      border-color: #333;
      box-shadow: 0 0 0 3px rgba(0,0,0,0.1);
    }
    
    .comments {
      color: #e74c3c;
      font-size: 12px;
      margin-top: 5px;
    }
    
    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 20px 0;
      font-size: 14px;
    }
    
    .remember-forgot label {
      display: flex;
      align-items: center;
      margin: 0;
      font-weight: normal;
    }
    
    .remember-forgot input[type="checkbox"] {
      margin-right: 8px;
    }
    
    .remember-forgot a {
      color: #333;
      text-decoration: none;
      border-bottom: 1px solid #333;
    }
    
    .remember-forgot a:hover {
      color: #666;
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
      margin-top: 10px;
    }
    
    input[type="submit"]:hover {
      background: #555;
    }
    
    .new-login {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #666;
    }
    
    .new-login a {
      color: #333;
      text-decoration: none;
      font-weight: 600;
      border-bottom: 1px solid #333;
    }
    
    .new-login a:hover {
      color: #666;
    }
  </style>
</head>
<body>
  <form action="" method="post" id="login-form">
    <h1>Connexion</h1>
    <div class="login-input">
      <label for="username">Nom d'utilisateur</label>
      <input type="text" name="username" id="username"placeholder="Nom utilisateur">
      <p class="comments"></p>
    </div>
    <div class="login-input">
      <label for="password">Mot de passe</label>
      <input type="password" placeholder="Mot de passe" name="password" id="password">
      <p class="comments"></p>
    </div>
    <div class="remember-forgot">
      <label>
        <input type="checkbox">Se souvenir de moi
      </label>
      <a href="#">Mot de passe oublié?</a>
      
    </div>
    <input type="submit" class="btn" value="Se connecter">
    <div class="new-login">
      <p>Pas de compte ?<a href="inscription.php">Inscription</a></p>
    </div>
  </form>
  <script src="index.js"></script>
  
</body>
</html>