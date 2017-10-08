<?php
  require_once 'header.php';

  echo "<br><span class='main'> Welcome to $appname, ";

  if($loggedin)
  {
    $result=queryMysql("SELECT a.title, a.text, a.time, b.friend FROM posts a, friends b
                        WHERE a.author=b.user AND b.friend='$user'");

    $num=$result->num_rows;

    for($i=0; $i<$num; ++$i)
    {
      $row=$result->fetch_array(MYSQLI_ASSOC);

      echo "<h1>$row[title]</h2>";
      echo "<p>$row[text]</p>";
      echo "<hr>";
    }
  }
  else echo "please sign up and/or log in to join in.";
 ?>

 </span><br><br>
 
