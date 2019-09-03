<?php 
	
	if(isset($_POST['submit'])) {

		$domain = htmlspecialchars($_POST['domain']);
		$expirationDate = htmlspecialchars($_POST['expirationDate']);
		$seckretKey = "b7g79asdrig8aos7y546461nbguyvy6UTRFVhsfd";
		

		$license = array(
			'domain' => $domain,
			'expirationDate' => $expirationDate,
			'sign' => md5($domain.$expirationDate.$seckretKey)
		);
		
		$license = serialize($license);
		
		$license1 = base64_encode($license);
		
		$fp = fopen("license.li", "w");
		
		fwrite($fp, $license1);
		
		fclose($fp); 

		echo 
			'<div class="alert alert-success">
				<strong>Успешно!</strong> Файл лицензии для домена <b>'. $domain .'</b> license.li создан.
			</div>
		';
		
	}
 
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>DataWave - H a c k e d</title>
	
	<style>
	   .radius {
		background: #ffffff; /* Цвет фона */
		border: 1px solid black; /* Параметры рамки */
		padding: 15px; /* Поля вокруг текста */
		margin-bottom: 10px; /* Отступ снизу */
	   }
	</style>
  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

 </head>
 <body background="learn-how-to-hack-735x400.jpg">
<div class="container bgcont">
  <div class="row background-row">
 	<form action="" method="POST">
	
  <div style="border-radius: 8px;" class="radius">
   <img src="logo-cms.png" alt="DataWave - H a c k e d">
  </div>
	<div style="border-radius: 50px 0 0 50px;" class="radius">
   <label >Домен: </label>
	<input type="text" name="domain" placeholder="В формате domen.net"><br />
  </div>
  <div style="border-radius: 40px 10px" class="radius">
   <label >Срок действия лицензии: </label>
	<input type="text" name="expirationDate" placeholder="В формате 20200101"><br />
  </div>
  <div style="border-radius: 13em 0.5em/1em 0.5em;" class="radius">
   <input type="submit" name="submit" value="Получаем лицУху БеСпЛаТнО ;)">
  </div>
  	</form>
	</div>
	</div>
 </body>
 </html>