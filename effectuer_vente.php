<?php
$message = '';
$messageType = 'success';
$showSaleForm = false;
$clientId = null;
$clientValues = [
    'nom' => '',
    'prenom' => '',
    'age' => '',
    'adresse' => '',
    'ville' => '',
    'mail' => ''
];

try {
    $bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $articleStmt = $bdd->query('SELECT id_article, designation, prix FROM article ORDER BY designation ASC');
    $articles = $articleStmt->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';
        $clientValues['nom'] = trim($_POST['nom'] ?? '');
        $clientValues['prenom'] = trim($_POST['prenom'] ?? '');
        $clientValues['age'] = trim($_POST['age'] ?? '');
        $clientValues['adresse'] = trim($_POST['adresse'] ?? '');
        $clientValues['ville'] = trim($_POST['ville'] ?? '');
        $clientValues['mail'] = trim($_POST['mail'] ?? '');

        if ($action === 'enregistrer_client') {
            if (in_array('', $clientValues, true)) {
                $message = 'Veuillez remplir tous les champs du formulaire client.';
                $messageType = 'error';
            } else {
                $clientStmt = $bdd->prepare('INSERT INTO client (nom, prenom, age, adresse, ville, mail) VALUES (?, ?, ?, ?, ?, ?)');
                $clientStmt->execute([
                    $clientValues['nom'],
                    $clientValues['prenom'],
                    $clientValues['age'],
                    $clientValues['adresse'],
                    $clientValues['ville'],
                    $clientValues['mail']
                ]);
                $clientId = $bdd->lastInsertId();
                $showSaleForm = true;
                $message = 'Client enregistré. Complétez maintenant la validation de la vente.';
                $messageType = 'success';
            }
        } elseif ($action === 'valider_vente') {
            $clientId = trim($_POST['id_client'] ?? '');
            $id_article = trim($_POST['id_article'] ?? '');
            $qte = intval($_POST['qte'] ?? 0);

            if ($clientId === '' || $clientId === '0') {
                $message = 'Client introuvable. Veuillez enregistrer le client avant de valider la vente.';
                $messageType = 'error';
                $showSaleForm = true;
            } elseif ($id_article === '' || $qte <= 0) {
                $message = 'Veuillez choisir un article et une quantité valide.';
                $messageType = 'error';
                $showSaleForm = true;
            } else {
                $articleInfoStmt = $bdd->prepare('SELECT prix FROM article WHERE id_article = ?');
                $articleInfoStmt->execute([$id_article]);
                $articleInfo = $articleInfoStmt->fetch(PDO::FETCH_ASSOC);

                if (!$articleInfo) {
                    $message = 'Article introuvable.';
                    $messageType = 'error';
                    $showSaleForm = true;
                } else {
                    $prixUnit = $articleInfo['prix'];
                    $montant = $prixUnit * $qte;
                    $date = date('Y-m-d');

                    $commandeStmt = $bdd->prepare('INSERT INTO commande (id_client, date, montant) VALUES (?, ?, ?)');
                    $commandeStmt->execute([$clientId, $date, $montant]);
                    $id_comm = $bdd->lastInsertId();

                    $contenirStmt = $bdd->prepare('INSERT INTO contenir (id_comm, id_article, qte, prix_unit) VALUES (?, ?, ?, ?)');
                    $contenirStmt->execute([$id_comm, $id_article, $qte, $prixUnit]);

                    $message = 'Vente validée et enregistrée avec succès.';
                    $messageType = 'success';
                    $clientValues = ['nom' => '', 'prenom' => '', 'age' => '', 'adresse' => '', 'ville' => '', 'mail' => ''];
                    $clientId = null;
                    $showSaleForm = false;
                }
            }
        }
    }
} catch (PDOException $e) {
    $message = 'Erreur de base de données : ' . $e->getMessage();
    $messageType = 'error';
} catch (Exception $e) {
    $message = 'Erreur : ' . $e->getMessage();
    $messageType = 'error';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Effectuer une vente</title>
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
            max-width: 1100px;
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

        .page-header > div:first-child {
            flex: 1;
        }

        .page-header h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #666;
            font-size: 15px;
            font-weight: 400;
        }

        .page-actions {
            flex: 0 0 auto;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            font-weight: 500;
            animation: slideIn 0.4s ease-out;
        }

        .alert.success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            border-left: 5px solid #28a745;
        }

        .alert.error {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            border-left: 5px solid #dc3545;
        }

        .form-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .form-card {
            padding: 30px;
            background: #f8f9fa;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 2px solid transparent;
        }

        .form-card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            border-color: #667eea;
        }

        .form-card h2 {
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

        .form-group input,
        .form-group select {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-group input:hover,
        .form-group select:hover {
            border-color: #667eea;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.15);
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 14px 30px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            font-size: 15px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            flex: 1;
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        .btn-secondary {
            background-color: #93a7b9;
            color: white;
            box-shadow: 0 4px 15px rgba(147, 167, 185, 0.3);
            flex: 1;
        }

        .btn-secondary:hover {
            background-color: #7d8fa5;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 25px rgba(147, 167, 185, 0.5);
        }

        #validation-vente {
            display: none;
        }

        #validation-vente:not([hidden]) {
            display: block;
            animation: slideIn 0.4s ease-out;
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

            .form-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .form-card {
                padding: 25px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
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
                <div>
                    <h1>Effectuer une vente</h1>
                    <p class="page-subtitle">Enregistrez le client et la commande</p>
                </div>
                <div class="page-actions">
                    <a href="accueil.php" class="btn btn-secondary">← Retour</a>
                </div>
            </div>

            <?php if ($message !== '') : ?>
                <div class="alert <?php echo htmlspecialchars($messageType); ?>"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <form id="vente-form" method="post">
                <div class="form-container">
                    <div class="form-card">
                        <h2>👤 Informations client</h2>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($clientValues['nom']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($clientValues['prenom']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Âge</label>
                            <input type="number" id="age" name="age" min="1" value="<?php echo htmlspecialchars($clientValues['age']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" id="adresse" name="adresse" value="<?php echo htmlspecialchars($clientValues['adresse']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" id="ville" name="ville" value="<?php echo htmlspecialchars($clientValues['ville']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="mail">Email</label>
                            <input type="email" id="mail" name="mail" value="<?php echo htmlspecialchars($clientValues['mail']); ?>" required>
                        </div>
                        <button type="submit" formnovalidate name="action" value="enregistrer_client" class="btn btn-primary">✅ Enregistrer client</button>
                    </div>

                    <div class="form-card" id="validation-vente" <?php echo $showSaleForm ? '' : 'hidden'; ?>>
                        <h2>📦 Validation vente</h2>
                        <input type="hidden" name="id_client" id="id_client" value="<?php echo htmlspecialchars($clientId); ?>">
                        <div class="form-group">
                            <label for="id_article">Article</label>
                            <select id="id_article" name="id_article" required>
                                <option value="">Sélectionner un article</option>
                                <?php foreach ($articles as $article) : ?>
                                    <option value="<?php echo htmlspecialchars($article['id_article']); ?>" data-prix="<?php echo htmlspecialchars($article['prix']); ?>">
                                        <?php echo htmlspecialchars($article['designation'] . ' - ' . $article['prix'] . ' $'); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qte">Quantité</label>
                            <input type="number" id="qte" name="qte" min="1" value="1" required>
                        </div>
                        <div class="form-group">
                            <label for="total">Total estimé</label>
                            <input type="text" id="total" value="$0" readonly>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="action" value="valider_vente" class="btn btn-primary">💰 Valider vente</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const articleSelect = document.querySelector('#id_article');
        const qteInput = document.querySelector('#qte');
        const totalInput = document.querySelector('#total');
        const validationForm = document.querySelector('#validation-vente');

        function updateTotal() {
            const articleOption = articleSelect.selectedOptions[0];
            const prix = articleOption ? parseFloat(articleOption.dataset.prix || 0) : 0;
            const qte = parseInt(qteInput.value, 10) || 0;
            totalInput.value = qte > 0 ? '$' + (prix * qte).toFixed(2) : '$0';
        }

        articleSelect.addEventListener('change', updateTotal);
        qteInput.addEventListener('input', updateTotal);
        updateTotal();
    </script>
</body>
</html>
