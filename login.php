<?php
  require_once 'header.php';

  echo "<div class='main'><h3>Please enter your detalis to log in</h3></div>";
  $error=$user=$pass="";

  if(isset($_POST['user']))
  {
    $user=sanitazeString($_POST['user']);
    $pass=sanitazeString($_POST['pass']);

    if($user==""||$pass=="")
    {
      $error="Not all fields were entered<br>";
    }
    else {
      $result=queryMysql("SELECT user pass FROM members WHERE user='$user' AND pass='$pass'");

      if($result->num_rows==0)
      {
        $error="<span class='error'>Username/Passord invalid </span><br><br>";
      }
      else {
        $_SESSION['user']=$user;
        $_SESION['pass']=$pass;
        die("You are now logged in. Please <a href='index.php?view=$user'>Click here</a> to continue.<br><br>");
      }
    }
  }

  echo <<<_END
  <form method='post' action='login.php'>$error
  <span class='fieldname'>Username</span><input type='text' maxlength='16' name='user' value='$user'><br>
  <span class='fieldname'>Password</span><input type='text' maxlength='16' name='pass' value='$pass'><br>
_END;
 ?>

     <br>
     <span class='fieldname'>&nbsp;</span>
     <input type='submit' value='Login'>
   </form><br></div>
   </body>
 </html>
