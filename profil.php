<?php
session_start();

if(!isset($_SESSION['login']))
{ //sprawdzamy czy jestesmy zalogowani
include('login.php');
exit();
}
?>
<?php 

include("dbconfig.php");



$userdata = $_SESSION['iduser_data'];

  
//echo $userdata;

    $stmt = $pdo->prepare("SELECT * FROM user_data WHERE iduser_data=:userdata"  );  
      $stmt->bindValue(':userdata', $userdata, PDO::PARAM_INT);  
       
      $stmt->execute();  
      //$uzytkownicy = $stmt->fetchAll(PDO::FETCH_ASSOC);  
/*isset($uzytkownicy[0])?$uzytkownicy[0]:'';
    if ($uzytkownicy == null) 
    {
      echo 'Logowanie nieudane. Sprawdź pisownię loginu oraz hasła.';
    }
    else 
    {
      $_SESSION['login'] = $login;
      $_SESSION['password'] = $haslo;

      header('Location: home.html');
    }
	*/
	//echo'</br>:dane';
	   foreach($stmt as $row)
                        {
                                echo '<hr/>
                                <p><b>imie:</b> '.$row['imie'].'</p>
                                <p><b>nazwisko:</b> '.$row['nazwisko'].'</p>
                                <p><b>adres:</b> '.$row['adres'].'</p>
                                <p><b>kodpocztowy:</b> '.$row['kod_pocztowy'].'</p>
                                <p><b>kraj:</b> '.$row['kraj'].'</p> 
								<p><b>nr tel:</b> '.$row['nr_tel'].'</p> 
								<p><b>email:</b> '.$row['email'].'</p>';								
                        }
                       
                        $stmt -> closeCursor();
						
?>