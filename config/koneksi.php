<?php
include "mysql_mysqli.inc.php";
?>
<?php
$host="localhost";
$user="root";
$pass="";
$database="vegasaudio";

$conn =mysql_connect($host, $user, $pass, $database);
if (!$conn) {
    die("Koneksi database gagal" . mysql_error());
}

mysql_select_db($database, $conn);
?>