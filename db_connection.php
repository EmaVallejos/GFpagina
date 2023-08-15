<?php
$db_host = 'localhost';
$db_port = '5432'
$db_name = 'postgres';
$db_user = 'postgres';
$db_pass = 'megust';

try {
    $db = new PDO("postgresql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>