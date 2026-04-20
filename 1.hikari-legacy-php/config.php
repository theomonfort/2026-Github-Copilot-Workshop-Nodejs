<?php
// Database configuration - Hikari Denki SAV Portal
// Last modified: 2006-03-15 by Tanaka-san

$db_host = "localhost";
$db_user = "root";
$db_pass = "hikari2005";
$db_name = "hikari_sav";

$conn = mysql_connect($db_host, $db_user, $db_pass);
if (!$conn) {
    die("Erreur de connexion: " . mysql_error());
}
mysql_select_db($db_name, $conn);

// Set charset
mysql_query("SET NAMES 'utf8'");

// Visitor counter
function incrementVisitorCount() {
    $file = "counter.txt";
    if (file_exists($file)) {
        $count = (int)file_get_contents($file);
    } else {
        $count = 0;
    }
    $count++;
    file_put_contents($file, $count);
    return $count;
}

// Helper to display date in Japanese format
function japanese_date($timestamp) {
    return date("Y年m月d日", $timestamp);
}
?>
