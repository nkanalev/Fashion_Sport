<?php
    
   include 'common.php';
  
   if(isset($_SESSION['loggedin']))
        {
            die("You are already logged in!");
        }
        if(isset($_POST['submit']))
        {
            $name = mysql_real_escape_string($_POST['email']);
            $pass = mysql_real_escape_string($_POST['password']);
            $db->query("SELECT * FROM users WHERE email = '{$name}' AND password = '{$pass}' LIMIT 1"); 
            $user = $db->fetch_object();
            if($user === false)
            {
                header("Location: login.php");
            }
            else
            {
                $_SESSION['loggedin'] = $user->id_user;
                header("Location: index.php");
            }
        }
 ?>
