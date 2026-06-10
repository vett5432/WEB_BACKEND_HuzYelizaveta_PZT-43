<html>
	<head>
	<title>Чтение из текстовых файлов</title>
	</head>
	<body>
	<?php
	$f = fopen("1.txt", "r");
	// Читать построчно до конца файла
	while(!feof($f)) { 
	    echo fgets($f) . "<br />";
	}
	fclose($f);
	?>
	</body>
	</html>
