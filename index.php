<html>
    <head>
        <meta charset="UTF-8">
        <title> Fashion Sport </title>
        <link rel="stylesheet" href="styles/index.css">
        <link rel="stylesheet" href="styles/slideshow.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script src="scripts/script.js"></script>
    </head>
    <body>
        <?php include_once 'menu.php';?>
    
    
        <div id="wrapper">
            <div class="columns">
                <section id="categoty">

                    <div id="slideshow">
                        <ul class="slides">
                            <li><img src="images/slideshow/adidas_logo.jpg" alt="Adidas Logo" /></li>
                            <li><img src="images/slideshow/puma_logo.jpg" alt="Puma Logo" /></li>
                            <li><img src="images/slideshow/nike_logo.jpg" alt="Nike Logo" /></li>
                            <li><img src="images/slideshow/tapout_logo.jpg" alt="Tapout Logo" /></li>
                            <li><img src="images/slideshow/no_fear_logo.jpg" alt="No Fear Logo" /></li>
                        </ul>

                        <span class="arrow previous"></span>
                        <span class="arrow next"></span>
                    </div>
                    <div class="list">
                        <?php
                            $db->query('SELECT * FROM products_meta as pm 
                                JOIN products_lang as pl ON pm.id_product=pl.id_product 
                                WHERE pl.id_lange=\''.$_SESSION['lang'].'\'');
                            while($row = $db->fetch_object())
                            {
                                echo '<article>
                                    <div class="featured_title"><a href = "product.php?id='.$row->id_product.'">'.$row->name.'</a></div>
                                    <div class="featured_image"><img src = "'.$row->pic.'"></div>
                                    <div class="text">
                                        <p>€'.$row->price.',<a href = "product.php?id='.$row->id_product.'">more</a></p>
                                    </div>
                                </article> ';
                            }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </section>
          </div>
        </div>
    </body>
</html>
