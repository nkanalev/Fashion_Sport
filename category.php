<html>
    <head>
        <meta charset="UTF-8">
        <title> Fashion Sport </title>
        <link rel="stylesheet" href="styles/index.css">
        
    </head>
    <body>
        <?php include_once 'menu.php';?>
        <div id="wrapper">
            <div class="columns">
                <section id="categoty">
                    <div class="list">
                        <?php
                            
                            if($_SESSION['lang'])
                                $db->query('SELECT * FROM products_meta as pm 
                                    JOIN products_lang as pl ON pl.id_product=pm.id_product 
                                    WHERE pm.id_category='.$_SESSION['category'].' AND pl.id_lange=\''.$_SESSION['lang'].'\'');
                            else if($_COOKIE['lang'])
                                $db->query('SELECT * FROM products_meta as pm 
                                    JOIN products_lang as pl ON pl.id_product=pm.id_product 
                                    WHERE pm.id_category='.$_SESSION['category'].' AND pl.id_lange=\''.$_COOKIE['lang'].'\'');
                            else
                                $db->query('SELECT * FROM products_meta as pm 
                                    JOIN products_lang as pl ON pl.id_product=pm.id_product 
                                    WHERE pm.id_category='.$_SESSION['category'].' AND pl.id_lange=\'en\'');
                            while($row = $db->fetch_object())
                            {
                                echo '<article>
                                    <div class="featured_title"><a>'.$row->name.'</a></div>
                                    <div class="featured_image"><a href = "product.php?id='.$row->id_product.'"><img src = "'.$row->pic.'"></a></div>
                                    <div class="text">
                                        <p>€'.$row->price.'</p>
                                        <a href = "product.php?id='.$row->id_product.'">more</a>
                                    </div>
                                </article> ';
                            }
                        ?>
                        </div>
                </section>
           </div>
        </div>
    </body>
</html>