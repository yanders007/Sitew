<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Ventes</title>
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
            max-width: 1100px;
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
        
        table {
            width: 100%;
            border-collapse: collapse;
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
        
        .montant {
            font-weight: 600;
            color: #27ae60;
        }
        
        .empty-message {
            text-align: center;
            padding: 40px;
            color: #999;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="accueil.php" class="back-link">← Retour</a>
        <h1>💰 Liste des Ventes</h1>
        
        <table>
            <thead>
                <tr>
                    <th>ID Commande</th>
                    <th>ID Client</th>
                    <th>Date</th>
                    <th>Montant (DA)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8','root','');
                    $reponse = $bdd->query("SELECT id_commande,	id_article,	qte_commande FROM contenir ORDER BY id_article DESC");
                    $count = 0;
                    $totalMontant = 0;
                    while ($donnees = $reponse->fetch()) {
                        $count++;
                        $totalMontant += $donnees['montant'];
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($donnees['id_vente']) . '</td>';
                        echo '<td>' . htmlspecialchars($donnees['id_client']) . '</td>';
                        echo '<td>' . htmlspecialchars($donnees['date_vente']) . '</td>';
                        echo '<td class="montant">' . number_format($donnees['montant'], 2, ',', ' ') . '</td>';
                        echo '</tr>';
                    }
                    if($count === 0) {
                        echo '<tr><td colspan="4" class="empty-message">Aucune vente enregistrée</td></tr>';
                    }
                ?>
            </tbody>
            <?php if($count > 0): ?>
            <tfoot>
                <tr style="background: #f5f5f5; font-weight: 600;">
                    <td colspan="3" style="text-align: right; padding: 12px; border: 1px solid #ddd;">Total</td>
                    <td style="padding: 12px; border: 1px solid #ddd; color: #27ae60;">
                        <?php echo number_format($totalMontant, 2, ',', ' '); ?>
                    </td>
                </tr>
            </tfoot>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
