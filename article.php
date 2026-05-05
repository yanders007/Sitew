<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
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
        
        h2 {
            font-size: 20px;
            margin-top: 30px;
            margin-bottom: 20px;
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        
        form {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            max-width: 600px;
        }

          .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        
        input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        input:focus {
            outline: none;
            border-color: #333;
            box-shadow: 0 0 0 2px rgba(0,0,0,0.1);
        }
        
        input[type="submit"] {
            width: auto;
            padding: 8px 20px;
            background: #333;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 0;
        }
        
        input[type="submit"]:hover {
            background: #555;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            max-width: 900px;
        }
        
        thead {
            background: #f5f5f5;
        }
        
        th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
            color: #333;
            border: 1px solid #ddd;
        }
        
        td {
            padding: 12px;
            border: 1px solid #ddd;
            color: #666;
        }
        
        tbody tr:hover {
            background: #f9f9f9;
        }
    </style>
</head>

<body>

    <?php
    $bdd=new PDO('mysql:host=localhost;dbname=site;charset=utf8','root','');
    if (isset($_POST['envoyer'])) {
        $id_article = $_POST['id_article'];
        $designation = $_POST['designation'];
        $prix = $_POST['prix'];
        $categorie = $_POST['categorie'];
        // Préparer et exécuter la requête d'insertion
        $stmt = $bdd->prepare("INSERT INTO article (id_article, designation, prix, categorie) VALUES (?, ?, ?, ?)");
        $stmt->execute([$id_article, $designation, $prix, $categorie]);
    }
    ?> 
    
      <div class="container">
        <a href="accueil.php" class="back-link">← Retour</a> 


    <h2>Ajouter un article</h2>
    <form method="post">
        <label for="id_article">ID Article :</label>
        <input type="text" name="id_article" id="id_article" required>
        <label for="designation">Désignation :</label>
        <input type="text" name="designation" id="designation" required>
        <label for="prix">Prix :</label>
        <input type="number" step="0.01" name="prix" id="prix" required>
        <label for="categorie">Catégorie :</label>
        <input type="text" name="categorie" id="categorie" required>
        <input type="submit" name="envoyer" value="Envoyer">
    </form>

    <h2>Liste des articles</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID Article</th>
                <th>Désignation</th>
                <th>Prix</th>
                <th>Catégorie</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Récupérer et afficher tous les articles
            $reponse = $bdd->query("SELECT * FROM article");
            while ($donnees = $reponse->fetch()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($donnees['id_article']) . '</td>';
                echo '<td>' . htmlspecialchars($donnees['designation']) . '</td>';
                echo '<td>' . htmlspecialchars($donnees['prix']) . '</td>';
                echo '<td>' . htmlspecialchars($donnees['categorie']) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

</body>

</html>