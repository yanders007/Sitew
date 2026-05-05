<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Effectuer une Vente</title>
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
            max-width: 700px;
            margin: 0 auto;
        }
        
        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 25px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 15px;
        }
        
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #333;
            font-weight: 600;
        }
        
        .back-link:hover {
            background: #333;
            color: white;
        }
        
        form {
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background: #f9f9f9;
        }
        
        .form-group {
            margin-bottom: 18px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        
        input, select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            font-family: inherit;
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: #333;
            box-shadow: 0 0 0 3px rgba(0,0,0,0.1);
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 12px;
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
        
        .success-message {
            padding: 15px;
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            color: #155724;
            margin-bottom: 20px;
        }
        
        .error-message {
            padding: 15px;
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            color: #721c24;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="accueil.php" class="back-link">← Retour</a>
        <h1>✅ Effectuer une Vente</h1>
        
        <?php
            $message = '';
            $messageType = '';
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nom = trim($_POST['nom'] ?? '');
                $prenom = trim($_POST['prenom'] ?? '');
                $age = intval($_POST['age'] ?? 0);
                $adresse = trim($_POST['adresse'] ?? '');
                $ville = trim($_POST['ville'] ?? '');
                $mail = trim($_POST['mail'] ?? '');
                $id_article = intval($_POST['id_article'] ?? 0);
                $prix_unit = floatval($_POST['prix_unit'] ?? 0);
                $id_comm = trim($_POST['id_comm'] ?? '');
                $qte = intval($_POST['qte'] ?? 0);
                
                // Validation
                if (empty($nom) || empty($prenom) || $age <= 0 || empty($adresse) || empty($ville) || empty($mail) || $id_article <= 0 || $prix_unit <= 0  || $qte <= 0 || $id_comm <= 0) {
                    $message = "Tous les champs sont obligatoires et doivent être valides.";
                    $messageType = 'error';
                } else {
                    try {
                        $bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8','root','');
                        
                        // Insérer le client
                        $stmt_client = $bdd->prepare("INSERT INTO client (nom, prenom, age, adresse, ville, mail) VALUES (?, ?, ?, ?, ?, ?)");
                        $stmt_client->execute([$nom, $prenom, $age, $adresse, $ville, $mail]);
                        $id_client = $bdd->lastInsertId();
                        
                        // Insérer la vente
                        $date = date('Y-m-d H:i:s');
                        $stmt_vente = $bdd->prepare("INSERT INTO ligne (id_client, id_article,  qte ,prix_unit) VALUES (?, ?, ?, ?)");
                        $stmt_vente->execute([$id_client, $id_article, $qte, $prix_unit]);
                        
                        $message = "Vente effectuée avec succès! Client ID: $id_client";
                        $messageType = 'success';
                    } catch (Exception $e) {
                        $message = "Erreur lors de l'enregistrement: " . $e->getMessage();
                        $messageType = 'error';
                    }
                }
            }
        ?>
        
        <?php if (!empty($message)): ?>
            <div class="<?php echo $messageType === 'success' ? 'success-message' : 'error-message'; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        
        <form method="post">
            <h3 style="margin-bottom: 20px; font-size: 18px;">Informations du Client</h3>
            
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Entrez le nom du client" required>
            </div>
            
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" placeholder="Entrez le prénom du client" required>
            </div>
            
            <div class="form-group">
                <label for="age">Âge</label>
                <input type="number" name="age" id="age" placeholder="Entrez l'âge du client" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" placeholder="Entrez l'adresse du client" required>
            </div>
            
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville" placeholder="Entrez la ville du client" required>
            </div>
            
            <div class="form-group">
                <label for="mail">Email</label>
                <input type="email" name="mail" id="mail" placeholder="Entrez l'email du client" required>
            </div>
            
            <h3 style="margin-bottom: 20px; margin-top: 25px; font-size: 18px;">Informations de la Vente</h3>
            
            <div class="form-group">
                <label for="id_article">ID Article</label>
                <input type="number" name="id_article" id="id_article" placeholder="Entrez l'ID de l'article" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="id_comm">ID commande</label>
                <input type="number" name="	id_comm" id="id_comm" placeholder="Entrez l'ID de la commande" min="1" required>
            </div>
            <div class="form-group">
                <label for="prix_unit">Prix unitaire (PU)</label>
                <input type="number" name="prix_unit" id="prix_unit" placeholder="Entrez le prix unitaire" step="0.01" min="0.01" required>
            </div>
            
            <div class="form-group">
                <label for="qte">Quantité</label>
                <input type="number" name="	qte" id="qte" placeholder="Entrez l'ID de la commande" min="1" required>
            </div>
            <input type="submit" value="Enregistrer la Vente">
        </form>
    </div>
</body>
</html>
