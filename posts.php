<?php
  require_once 'header.php';

  if(!$loggedin) die();
  $title=$text="";
  if(isset($_GET['view'])) $view=sanitazeString($_GET['view']);
  else $view=$user;

  if(isset($_POST['title']) && isset($_POST['text']))
  {
    $title=sanitazeString($_POST['title']);
    $text=sanitazeString($_POST['text']);

    if($title=="" || $text=="")
    {
      echo "Not all fiels are entered";
    }

    else {
      queryMysql("INSERT INTO posts VALUES(NULL, '$title','$text','$user', NOW())");
    }
  }

  echo <<<_END
        <form method="post" action='posts.php?view=$user'>
          <span class='fieldname'>Post title
          <input type='text' name='title' value=$title></span>
          <span class='fieldname'>Post text
          <textarea name='text'>$text</textarea></span>
          <br>
          <input type='submit' value='Add post' style='margin-left:100px'>
          </form><br>
_END;

 ?>
