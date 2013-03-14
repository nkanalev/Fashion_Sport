<?php 
    include 'common.php';
  
    if(isset($_SESSION['loggedin']))
    {
        $id_user = $_SESSION['loggedin'];
        $db->query('SELECT * FROM products_meta as pm 
                    JOIN products_lang as pl ON pm.id_product=pl.id_product 
                    JOIN products_info as pi ON pm.id_product=pi.id_product 
                    WHERE pm.id_category='.$_SESSION['category'].' AND pl.id_lange=\''.$_SESSION['lang'].'\'');
        $row = $db->fetch_object();
        
        $id_product = $row->id_product;
        $quantity = $_POST['quantity'];
        $size = $_POST['size'];
        $db->query('UPDATE `orders` SET `payed`=1 
                    WHERE id_user='.$id_user.'');
       
    }
    header("Location: index.php");
?>
