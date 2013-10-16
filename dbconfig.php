<?php
$mysql_host = 'localhost'; //lub jakiś adres: np sql.nazwa_bazy.nazwa.pl
$port = '3306'; //domyślnie jest to port 3306
$username = 'root';
$password = '';
$database = 'CRM_system'; //'produkty'
 
try{
        $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo 'Połączenie nawiązane!';
}catch(PDOException $e){
        echo 'Połączenie nie mogło zostać utworzone.<br />';
}
?>