<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
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
            max-width: 1400px;
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
                <h1>👥 Liste des Clients</h1>
                <div class="page-actions">
                    <a href="accueil.php" class="btn btn-secondary">← Retour</a>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID Client</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Âge</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8','root','');
                    $reponse = $bdd->query("SELECT id_client, nom, prenom, age, adresse, ville, mail FROM client ORDER BY id_client DESC");
                    $count = 0;
                    while ($donnees = $reponse->fetch()) {
                        $count++;
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($donnees['id_client']) . '</td>';
                        echo '<td>' . htmlspecialchars($donnees['nom']) . '</td>';
                        echo '<td>' . htmlspecialchars($donnees['prenom']) . '</td>';
                        echo '<td>' . htmlspecialchars($donnees['age']) . '</td>';
                        echo '<td>' . htmlspecialchars($donnees['adresse']) . '</td>';
                        echo '<td>' . htmlspecialchars($donnees['ville']) . '</td>';
                        echo '<td>' . htmlspecialchars($donnees['mail']) . '</td>';
                        echo '</tr>';
                    }
                    if($count === 0) {
                        echo '<tr><td colspan="7" class="empty-message">Aucun client enregistré</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
