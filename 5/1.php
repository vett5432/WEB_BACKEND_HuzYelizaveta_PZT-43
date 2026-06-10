<html>
	<head>
	<title>Файловая система</title>
	</head>
	<body>


	<?php
	  
	// Найти и записать свойства
	echo "<h1>file: lesson14.php</h1>";
	echo "<p>В последний раз редактировался: " . date("r", filemtime("lesson14.php")); 
	echo "<p>В последний раз был открыт: " . date("r", fileatime("lesson14.php")); 
	echo "<p>Размер: " . filesize("lesson14.php") . " байт";
	
	?>


	</body>
	</html>
	
