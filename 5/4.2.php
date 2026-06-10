<html>
	<head>
	<title>Запись в текстовый файл</title>
	</head>
	<body>
        <form method="post">
    <textarea name="textblock"></textarea><br>
    <input type="submit">
</form>
	<?php
	// Открыть текстовый файл
	$f = fopen("textfile.txt", "w");
	// Записать текст
	fwrite($f, $_POST["textblock"]); 
	// Закрыть текстовый файл
	fclose($f);
	// Открыть файл для чтения и прочитать строку
	$f = fopen("textfile.txt", "r");
	// Читать текст
	echo fgets($f); 
	fclose($f);
	?>
	</body>
	</html>


