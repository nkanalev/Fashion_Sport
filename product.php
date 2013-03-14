<html>
<head>
<title>FashioN SporT</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/product.css" />
<?php include_once 'common.php';?>
</head>

<body>
	<?php include_once 'menu.php';
        $db->query('SELECT * FROM products_meta as pm 
            JOIN products_lang as pl ON pm.id_product=pl.id_product 
            JOIN products_info as pi ON pm.id_product=pi.id_product 
            WHERE pl.id_lange=\''.$_SESSION['lang'].'\' AND pl.id_product=\''.$_SESSION['id'].'\'');
        $row = $db->fetch_object();
        ?>
        
        <div id="productview">
            <section class ="pictures">
                <div class="main_picture">
                     <?php echo'<a href="#"><img src="'.$row->pic.'" alt="" width="198" height="198" /></a>';?>
                </div>
            </section>
            <form class="information" action="process_adding.php" method="post">
                
                <div class="row">
                    <span><?php echo $lang['PRICE']; ?> :</span>
                    <?php echo'<span class="number">€'.$row->price.'</span>';?>
                    
                </div>
                <div class="row">
                    <?php echo'<span>'.$row->name.'</span>';?>
                </div>
                <div class="row">
                    <div class="color">
                        <label><?php echo $lang['COLOR']; ?> :</label>
                        <select name="color">
                            <?php 
                                while($row=$db->fetch_object())
                                    echo'<option value="'.$row->color.'">'.$row->color.'</option>';?>
                        </select>
                    </div>
                    <div class="color">
                        <label><?php echo $lang['SIZE']; ?> :</label>
                        <select name="size">
                            <?php $db->query('SELECT * FROM products_meta as pm 
                                JOIN products_lang as pl ON pm.id_product=pl.id_product 
                                JOIN products_info as pi ON pm.id_product=pi.id_product 
                                WHERE pl.id_lange=\''.$_SESSION['lang'].'\' AND pl.id_product=\''.$_SESSION['id'].'\'');
                                while($row=$db->fetch_object())
                                    echo'<option value="'.$row->size_product.'">'.$row->size_product.'</option>';?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <span><?php echo $lang['QUANTITY']; ?> :</span>
                    <input type="text" name="quantity">
                </div>
                
                <div class="row">
                   <button name="submit" type="submit" onclick="alert('added to cart')" >ADD TO CART</button>
                </div>
            </form>
            <div class="clearfix"></div>
            <section class="description">
                <?php $db->query('SELECT * FROM products_meta as pm 
                    JOIN products_lang as pl ON pm.id_product=pl.id_product 
                    JOIN products_info as pi ON pm.id_product=pi.id_product 
                    WHERE pm.id_product='.$_SESSION['id'].' AND pl.id_lange=\''.$_SESSION['lang'].'\'');
                $row = $db->fetch_object();
                echo '<p>'.$row->description.'</p>';
                ?>
            </section>
            </div>
           
</body>
</html>
