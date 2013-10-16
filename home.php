<?php
session_start();

if(!isset($_SESSION['login']))
{ //sprawdzamy czy jestesmy zalogowani
include('login.php');
exit();
}
?>
<!DOCTYPE html >
<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="" >
<meta name="Robots" content="index,follow" />		

<link rel="stylesheet" href="images/main_bgr.css" type="text/css" />

<title>CRMSystem</title>

</head>

<body>

<div id="topmenu">
	
	 <ul id="menu">
	<li><a href="#">Home</a></li>
	
	<li><a href="#">opcja 1</a></li>
	<li><a href="#">opcja 2</a></li>
	<li ><a href="#">opcja 3</a></li>
	<li id="logout">
		<a href="#">Witaj: <?php echo $_SESSION['login']; ?> </a>
		<ul>
			<li><a href="profil.php">Profil</a></li>
			<li><a href="#">opcja 2</a></li>
			<li><a href="#">opcja 3</a></li>
			<li><a href="logout.php">Wyloguj</a></li>
		</ul>
	</li>
	
</ul>
	</div>
	



</body>
</html>