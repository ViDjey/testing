<!DOCTYPE html>
<html lang = "ru">
  <head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width = device-width, user-scalable = no, initial-scale = 1.0, maximum-scale = 1.0, minimum-scale = 1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> <!--p>connecting to Bootstrap</p-->
    <link rel = "stylesheet" href = "style.css">
    <title>Тестовое задание</title>
  </head>
  <body> 
    <div class = "con bg-light">
		<form action = "" method = "post" id = "form">
	            <input type = "text"  name = "search_mess" placeholder = "Начать поиск..."><br><br>
	            <input type = "submit" name="send" value = "Найти"><br>
	  </form>
    <?php
      include 'work.php';
    ?>
  </div>
  </body> 
</html>