<?php
  
  session_start();
  require('dbconfig.php');

  if (isset($_POST['login']) and isset($_POST['password']) )
  {

    $login = mysql_real_escape_string(trim($_POST['login']));

    $password = md5(mysql_real_escape_string (trim($_POST['password'])));


    $stmt = $pdo->prepare("SELECT * FROM user WHERE login=:login AND pass=:password"  );  
      $stmt->bindValue(':login', $login, PDO::PARAM_STR);  
      $stmt->bindValue(':password', $password, PDO::PARAM_STR);  
      //$stmt->execute();


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
	$data = $stmt->fetchAll(); // fetching rows


	$count = $stmt->rowCount();
        //var_dump($count);
       // print_r($db->errorInfo());
if($count){
        //$uzytkownicy2 = $stmt->fetchAll(PDO::FETCH_OBJ);
       // var_dump($result);
       // print_r($db->errorInfo());
	   session_start();
	  //$uzytkownicy = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
	//var_dump($uzytkownicy);
       $_SESSION['login'] = $login;
       $_SESSION['password'] = $password;
	 //  if(isset($_SESSION['iduser_data'])){$_SESSION['iduser_data']=$uzytkownicy['iduser_data'] ; }
	 $count = count($data); // getting count
foreach($data as $row) { // iterating over rows
     // using row
	 $_SESSION['iduser_data'] =$row['iduser_data'];
	echo $_SESSION['iduser_data'];
}
	  // $_SESSION['iduser_data'] =$uzytkownicy['iduser_data'];
     //print $data['title'].'<br>'; 

	  //$_SESSION['iduser_data'] =$uzytkownicy->iduser_data;
     //  echo $_SESSION['iduser_data'];
       //echo 'true';
	//  foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
   // print $row;
//}
	   header('Location: home.php');
	  
}else{
       echo 'Logowanie nieudane. Sprawdź pisownię loginu oraz hasła.';
}
  } 
?>