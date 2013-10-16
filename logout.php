<?php
session_start();
if(isset($_SESSION['login'])) {
unset($_SESSION['login']);
}
session_destroy(); // niszczenie sesji
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    
    <title>CRMSystem</title>
<link rel="stylesheet" href="" type="text/css">
<meta http-equiv="refresh" content="1; url=index.html">
  </head>
  <body>
<div class="komunikat">

Wylogowanie zakończone pomyślnie.<br/> Zapraszamy ponownie.


</div>
</body>
</html>