<?php
include_once 'database.php';

$db = include ROOT_PATH . 'config.php';

define('DB_HOST', $db['host']);
define('DB_USER', $db['user']);
define('DB_PASSWORD', $db['password']);
define('DB_NAME', $db['name']);
define('DB_PORT', $db['port']);

 try {
    //  Exemple de requête simple pour vérifier la conne
          $result = select('logs', 'id, form, data'); // Sélectionner les colonnes id, form et data

          
// Si la requête est exécutée avec succès, la connexion à la base de données est établie
 echo "Connexion à la base de données établie avec succès.";
 // Afficher les résultats de la requête
 if ($result) {
     echo "<pre>";
     print_r($result);
     echo "</pre>";
 } else {
     echo "La requête n'a retourné aucun résultat.";
 }
 // Exemple d'exécution d'une autre requête SQL
 $result = run_query("SELECT * FROM logs");
 // Traitez le résultat ici

 } catch (Exception $e) {
     // Si une exception est levée, la connexion a échoué
     echo "Échec de la connexion à la base de données : " . $e->getMessage();
 }
?>
