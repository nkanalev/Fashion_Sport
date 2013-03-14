<?php 
    include 'common.php';

    $username = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['confirm_password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $telephone = $_POST['telephone'];
    $country = $_POST['country'];
    $area = $_POST['area'];
    $city = $_POST['city'];
    $post_code = $_POST['post_code'];
    $address = $_POST['address'];
    
    // Ползвам тези 2 променливи за валидиране на e-mail и парола
    
   
    
    if($password == $confpassword)
    {
        
        $db->query('INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`, `phone_number`, `country`, `area`, `city`, `post_code`, `address`) VALUES 
                                       (\''.$username.'\',\''.$password.'\',\''.$first_name.'\',\''.$last_name.'\',\''.$phone_number.'\',\''.$country.'\',\''.$area.'\',\''.$city.'\','.$post_code.',\''.$address.'\')');
        header('Location: login.php');
    }
    else {
        include_once 'register.php';
    }

?>
