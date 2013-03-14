<?php 
    include 'common.php';
  
    if(isset($_SESSION['loggedin']))
    {
        $id_user = $_SESSION['loggedin'];
        $db->query('SELECT * FROM products_meta as pm JOIN products_lang as pl ON pm.id_product=pl.id_product JOIN products_info as pi ON pm.id_product=pi.id_product WHERE pm.id_category='.$_SESSION['category'].' AND pl.id_lange=\''.$_SESSION['lang'].'\'');
        $row = $db->fetch_object();
        
        $id_product = $row->id_product;
        $quantity = $_POST['quantity'];
        $size = $_POST['size'];
        $db->query('SELECT * FROM orders  WHERE id_user='.$id_user.' AND id_product='.$id_product.' AND size_product=\''.$size.'\' AND payed=0');
        if($row=$db->fetch_object())
        {
            $quantity = $quantity + $row->quantity;
            $db->query(' DELETE FROM `orders`(`id_product`, `id_user`, `quantity`, `size_product`, `payed`) VALUES ('.$id_product.','.$id_user.','.$quantity.',\''.$size.'\',0);');
            
        }
        
        $db->query('INSERT INTO `orders`(`id_product`, `id_user`, `quantity`, `size_product`, `payed`) VALUES ('.$id_product.','.$id_user.','.$quantity.',\''.$size.'\',0);');
    }
    header("Location: product.php?id=".$id_product."");
?>
