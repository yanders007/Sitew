<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Articles</title>
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
            max-width: 1200px;
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

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 3px solid #e0e0e0;
            gap: 30px;
        }

        .page-header h1 {
            font-size: 32px;
            color: #333;
            font-weight: 700;
        }

        .page-actions {
            flex: 0 0 auto;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            font-size: 15px;
        }

        .btn-secondary {
            background-color: #93a7b9;
            color: white;
            box-shadow: 0 4px 15px rgba(147, 167, 185, 0.3);
        }

        .btn-secondary:hover {
            background-color: #7d8fa5;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 25px rgba(147, 167, 185, 0.5);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        .form-section {
            margin-bottom: 40px;
            padding: 30px;
            background: #f8f9fa;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 2px solid transparent;
        }

        .form-section:hover {
            transform: scale(1.01);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            border-color: #667eea;
        }

        .form-section h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group input {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-group input:hover {
            border-color: #667eea;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.15);
        }

        .form-actions {
            margin-top: 20px;
        }

        .table-section {
            margin-top: 40px;
        }

        .table-section h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 25px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: white;
            border: none;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
            color: #666;
        }

        tbody tr {
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            cursor: pointer;
        }

        tbody tr:hover {
            background: #f0f4ff;
            transform: scale(1.01);
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.15);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .empty-message {
            text-align: center;
            padding: 40px;
            color: #999;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .page-card {
                padding: 25px;
            }

            .page-header {
                flex-direction: column;
                gap: 20px;
                margin-bottom: 30px;
                padding-bottom: 20px;
            }

            .page-header h1 {
                font-size: 26px;
            }

            .form-section {
                padding: 20px;
            }

            table {
                font-size: 14px;
            }

            th, td {
                padding: 10px;
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
            <div class="page-header">
                <h1>📦 Gestion Articles</h1>
                <div class="page-actions">
                    <a href="accueil.php" class="btn btn-secondary">← Retour</a>
                </div>
            </div>

            <div class="form-section">
                <h2>Ajouter un article</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="id_article">ID Article :</label>
                        <input type="text" name="id_article" id="id_article" required>
                    </div>
                    <div class="form-group">
                        <label for="designation">Désignation :</label>
                        <input type="text" name="designation" id="designation" required>
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix :</label>
                        <input type="number" step="0.01" name="prix" id="prix" required>
                    </div>
                    <div class="form-group">
                        <label for="categorie">Catégorie :</label>
                        <input type="text" name="categorie" id="categorie" required>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="envoyer" value="Envoyer" class="btn btn-primary">✅ Ajouter</button>
                    </div>
                </form>
            </div>

            <div class="table-section">
                <h2>Liste des articles</h2>
                <table>
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
                        $bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8','root','');
                        $reponse = $bdd->query("SELECT * FROM article ORDER BY id_article DESC");
                        $count = 0;
                        while ($donnees = $reponse->fetch()) {
                            $count++;
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($donnees['id_article']) . '</td>';
                            echo '<td>' . htmlspecialchars($donnees['designation']) . '</td>';
                            echo '<td>' . htmlspecialchars($donnees['prix']) . ' $</td>';
                            echo '<td>' . htmlspecialchars($donnees['categorie']) . '</td>';
                            echo '</tr>';
                        }
                        if ($count === 0) {
                            echo '<tr><td colspan="4" class="empty-message">Aucun article enregistré</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>