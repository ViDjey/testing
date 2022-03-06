<?php
	$name_file_comm = 'https://jsonplaceholder.typicode.com/comments';
	$name_file_post = 'https://jsonplaceholder.typicode.com/posts';

	$fileContent = json_decode(file_get_contents($name_file_comm), true);

	$mysql = mysqli_connect('localhost', 'root', '', 'Mess');
    if (!$mysql) {
        echo 'Ошибка: Невозможно подключиться к MySQL';
    }
    else{
    	$Y=0;
    	$X=0;
    	for($i=0; $i < count($fileContent); $i++){
            $postId = $fileContent[$i]['postId'];
            $id = $fileContent[$i]['id'];
            $name = $fileContent[$i]['name'];
            $email = $fileContent[$i]['email'];
            $body =$fileContent[$i]['body'];

            $sql = "INSERT INTO `comments` (`postId`, `id`, `name`, `email`, `body`) VALUES ('$postId', '$id', '$name', '$email', '$body')";
            $result = mysqli_query($mysql,$sql);
            if($result != true){
                echo('комментарий не был загружен '. $i);
            }
            else{
            	$Y++;
            }
        }
        $fileContent = json_decode(file_get_contents($name_file_post), true);

        for($i=0; $i < count($fileContent); $i++){
		    $userId = $fileContent[$i]['userId'];
		    $id = $fileContent[$i]['id'];
		    $title = $fileContent[$i]['title'];
		    $body =$fileContent[$i]['body'];

		    $sql = "INSERT INTO `posts` (`userId`, `id`, `title`, `body`) VALUES ('$userId', '$id', '$title', '$body')";
		    $result = mysqli_query($mysql, $sql);
		    if($result != true){
            	echo('пост не был загружен '. $i);
            }
            else{
            	$X++;		 
            } 

        }
        echo "<script>console.log('Загружено ". $X . " записей и " . $Y . " комментариев');</script>";
        mysqli_close($mysql);
    }
?>