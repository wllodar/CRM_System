<?php
require('dbconfig.php');

$stmt = $pdo->prepare("SELECT * FROM info ORDER BY data DESC Limit 5"  );  
      //$stmt->bindValue(':login', $login, PDO::PARAM_STR);  
      //$stmt->bindValue(':password', $password, PDO::PARAM_STR);  
      //$stmt->execute();


$stmt->execute();

	$data = $stmt->fetchAll(); // fetching rows


	$count = $stmt->rowCount();
        //var_dump($count);
       // print_r($db->errorInfo());
if($count){
        //$uzytkownicy2 = $stmt->fetchAll(PDO::FETCH_OBJ);
       // var_dump($result);
       // print_r($db->errorInfo());
	  // session_start();
	  //$uzytkownicy = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
	//var_dump($uzytkownicy);
      // $_SESSION['login'] = $login;
      // $_SESSION['password'] = $password;
	 //  if(isset($_SESSION['iduser_data'])){$_SESSION['iduser_data']=$uzytkownicy['iduser_data'] ; }
	 $count = count($data); // getting count
foreach($data as $row) { // iterating over rows
     // using row
	 $tytul =$row['tytul'];
	 $data_inf=$row['data'];
	 $text = $row['text'];
	echo '<div class="info_kom"><p class = "tytul">'.$tytul.'</p><p class="data">'. $data_inf.'</p></br><p class = "text_info">'. $text. '</p></div>';
}
	  // $_SESSION['iduser_data'] =$uzytkownicy['iduser_data'];
     //print $data['title'].'<br>'; 

	  //$_SESSION['iduser_data'] =$uzytkownicy->iduser_data;
     //  echo $_SESSION['iduser_data'];
       //echo 'true';
	//  foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
   // print $row;
//}
	   //header('Location: home.php');
	  
}else{
       echo 'brak informacji';
}


?>