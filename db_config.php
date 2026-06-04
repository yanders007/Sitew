<?php
/**
 * Configuration de la base de données
 * Fichier centralisé pour gérer la connexion à la base de données
 */

// Paramètres de connexion
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'site');
define('DB_CHARSET', 'utf8mb4');

/**
 * Fonction pour obtenir la connexion PDO à la base de données
 * @return PDO Objet de connexion à la base de données
 * @throws PDOException Si la connexion échoue
 */
function getDatabase() {
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
?>
