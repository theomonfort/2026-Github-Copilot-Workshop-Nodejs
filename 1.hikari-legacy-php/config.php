<?php
// Database configuration - Hikari Denki SAV Portal
// Last modified: 2006-03-15 by Tanaka-san

$db_host = "localhost";
$db_user = "root";
$db_pass = "hikari2005";
$db_name = "hikari_sav";

// NOTE: mysql_* functions removed in PHP 7.0+
// This legacy code requires PHP 4.3-5.6 to fully work
// Connection will silently fail on modern PHP (no DB = fallback to hardcoded data)
$conn = false;
if (function_exists('mysql_connect')) {
    $conn = @mysql_connect($db_host, $db_user, $db_pass);
    if ($conn) {
        mysql_select_db($db_name, $conn);
        mysql_query("SET NAMES 'utf8'");
    }
}

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
