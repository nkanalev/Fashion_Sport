<html>
    <head>
        <title>FashioN SporT</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="styles/cart.css" />
        <?php include_once 'common.php';?>
    </head>
    
    <body>
	<?php include_once 'menu.php';?>
        <form class="cart_menu" action="process_cart.php">
            <h3 style="margin-top: 20px"> <?php echo $lang['CART']; ?></h3>
            <div class ="table_names">
                <div style="width:400px">
                    <span> Name </span>
                </div>
                <div style="width:83px">
                    <span> Size </span>
                </div>
                <div style="width:83px">
                    <span> Color </span>
                </div>
                <div style="width:83px">
                    <span> Quantity </span>
                </div>
                <div style="width:50px">
                    <span> Price </span>
                </div>
                <div style="width:50px">
                    <span> Total </span>
                </div>
                
            </div>
            
            <div class="clearfix"></div>
            <div style="border-bottom: 1px solid #c9c9c9; "></div>
            <?php
            
                $id_user = $_SESSION['loggedin'];
                $db->query('SELECT * FROM orders WHERE id_product='.$_SESSION['id'].' AND payed=0');
                $row=$db->fetch_object();
                
                $db->query('SELECT * FROM products_meta AS pm 
                    JOIN products_lang AS pl ON pm.id_product=pl.id_product 
                    JOIN orders AS o ON pm.id_product=o.id_product 
                    WHERE o.id_user='.$_SESSION['loggedin'].' AND pl.id_lange=\''.$_SESSION['lang'].'\' AND o.payed=0');
                $total=0;
                while($row=$db->fetch_object())
                {
                    echo'<div class ="table_names">
                         <div style="width:400px">';
                             echo'<span>'.$row->name.'</span>';
                         echo'</div>
                         <div style="width:83px">';
                             echo'<span>'.$row->size_product.'</span>';
                         echo'</div>
                         <div style="width:83px">';
                             echo'<span>'.$row->color.'</span>';
                         echo'</div>
                         <div style="width:83px">';
                             echo'<span>'.$row->quantity.'</span>';
                             echo'</div>
                         <div style="width:50px">';
                             echo'<span>€'.$row->price.'</span>';
                             echo'</div>
                         <div style="width:50px">';
                             echo'<span>€'.$row->quantity*$row->price.'</span>';
                         echo'</div>
                    </div>';
                         $total = $total + $row->quantity*$row->price;
                };
          ?>
             <div class="clearfix"></div>
            <div style="border-bottom: 1px solid #c9c9c9; "></div>
            <div class ="table_names">
                <div style="width:700px">
                   
                </div>
                <div style="width:50px">
                   <?php echo '€'.$total;?>
                </div>
            </div>
            <div class ="table_names">
                <div style="width:700px">

                </div>
                <div style="width:50px">
                   <button name="buy" type="submit" onclick="alert('Transaction was made')" ><?php echo $lang['BUY'] ?></button>
                </div>
            </div>
        </form>
     </body>
</html>
