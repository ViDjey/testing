<?php
	if (isset($_POST['send'])){
	  $text_search = $_POST["search_mess"];
	  if (strlen($text_search) < 3){
	     echo '<div class="text-danger fs-4">Слишком короткий запрос</div>';
	  }
	  else{
	    $mysql = mysqli_connect('localhost', 'root', '', 'Mess');
		  if (!$mysql) {
	      echo '<div class="text-danger fs-4">Ошибка: Невозможно подключиться к MySQL</div>';
	    }
	    else{
        $sql="SELECT posts.title, comments.name, comments.body  FROM `comments`, `posts` WHERE (comments.body LIKE '%$text_search%' OR comments.name LIKE '%$text_search%') AND comments.postId = posts.id";
        $result = mysqli_query($mysql, $sql);
        if($result != true){
          echo('ERROR ');
        }
        else{
        	$kol_post = true;
          while ($req = mysqli_fetch_array($result)) {
          	$kol_post = false;
            echo("<div class = 'text-primary fs-3 fw-bold'>" . $req['title'] . "</div><br> <div class ='fs-4 fw-bold'>" . $req['name'] . "</div><br>");
            $mess = wordwrap($req['body'], 200, "\n", true);
            echo( " <div class = 'fs-4'>" . $mess . "</div><br><hr />" );
          }
          if ($kol_post) echo (" <div class = 'fs-4'>Ничего не было найдено</div><br>" );
        }
	    }
	  }
	            
	}    
?>