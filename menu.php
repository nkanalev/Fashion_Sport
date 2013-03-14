<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/menu.css">
        <?php include_once 'common.php';?>
        <script type="text/javascript" src="scripts/menu.js"></script>
    </head>
    <body>
        <div class="toolbar">
            <div class="toolbar_columns">
                <div class ="left_toolbar">
                        <h1><a href="index.php"><?php echo $lang['HOME']; ?></a></h1>																																																			
                        <h1><a href="#"><?php echo $lang['MEN']; ?></a></h1>
                        <h1><a href="#"><?php echo $lang['WOMEN']; ?></a></h1>
                        <h1><a href="#"><?php echo $lang['CHILDREN']; ?></a></h1>
                </div>
                <div class ="right_toolbar">
                   
                    <?php if($_SESSION['loggedin'])
                          {
                            $db->query('SELECT * FROM USERS WHERE id_user = '. $_SESSION['loggedin'].'');
                            echo '<h1 ><a href="logout.php">'.$lang['LOGOUT'].'</a></h1>,<h1 ><a>'.$lang['HELLO'].','. $db->fetch_object()->email.'</a></h1>';
                            
                          }
                          else
                          {
                               echo '<h1 ><a href="login.php">'. $lang['LOGIN'].'</a></h1>';
                               echo '<h1 ><a href="register.php">'. $lang['REGISTER'].'</a></h1>';
                          }
                     ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="wrapper">
            <header>
                <h1 class="logo"><a href="#"> Fashion Sport </a></h1>
                <nav>
                    <h1><img src = "images/bg_flag.jpg" onclick="window.location='?lang=bg'"></h1>
                    <h1><img src = "images/fr_flag.jpg" onclick="window.location='?lang=fr'"></h1>
                    <h1><img src = "images/en_flag.jpg" onclick="window.location='?lang=en'"></h1>
                    <h1><a href="cart.php"><img src = "images/cart.jpg"></a></h1>
                </nav>
                <div class="clearfix"></div>
            </header>
            <div style="border-bottom: 4px solid #c9c9c9;"></div>
            
            <section id="left" style="position:relative;float:left">
                <h1 class="section_title"> <?php echo $lang['CATEGORY']; ?> </h1>
                <nav>
                    <ul>
                        <li>
                            <div>
                                <a onclick="change(1)" href="#"  ><?php echo $lang['CLOTHING']; ?></a>
                                <ul class="inside" id ="1" style="display: none">
                                    <li><a href="category.php?category=1"><?php echo $lang['TRACKSUITS']; ?></a></li>
                                    <li><a href="category.php?category=2"><?php echo $lang['COMBATS']; ?></a></li>
                                    <li><a href="category.php?category=3"><?php echo $lang['JEANS']; ?></a></li>
                                    <li><a href="category.php?category=4"><?php echo $lang['TOPS']; ?></a></li>
                                    <li><a href="category.php?category=5"><?php echo $lang['T-SHIRTS']; ?></a></li>
                                    <li><a href="category.php?category=6"><?php echo $lang['SHIRTS']; ?></a></li>
                                    <li><a href="category.php?category=7"><?php echo $lang['HOODIES']; ?></a></li>
                                    <li><a href="category.php?category=8"><?php echo $lang['SHORTS']; ?></a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a onclick="change(2)" href="#"  ><?php echo $lang['FOOTWEAR']; ?></a>
                                <ul class="inside" id ="2" style="display: none">
                                    <li><a href="category.php?category=9"><?php echo $lang['BOOTS']; ?></a></li>
                                    <li><a href="category.php?category=10"><?php echo $lang['TRAINERS']; ?></a></li>
                                    <li><a href="category.php?category=11"><?php echo $lang['FLIP-FLOPS']; ?></a></li>
                                    <li><a href="category.php?category=12"><?php echo $lang['SANDALS']; ?></a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="category.php?category=13" class="type1"><?php echo $lang['UNDERWEAR']; ?></a></li>
                        <li>
                            <div class="type1">
                                <a onclick="change(3)" href="#"  ><?php echo $lang['ACCESSORIES']; ?></a>
                                <ul class="inside" id ="3" style="display: none">
                                    <li><a href="category.php?category=14"><?php echo $lang['BELTS']; ?></a></li>
                                    <li><a href="category.php?category=15"><?php echo $lang['RUCKSACK']; ?></a></li>
                                    <li><a href="category.php?category=16"><?php echo $lang['CAPS']; ?></a></li>
                                    <li><a href="category.php?category=17"><?php echo $lang['WATCHES']; ?></a></li>
                                    <li><a href="category.php?category=18"><?php echo $lang['SUNGLASSES']; ?></a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="category.php?category=19" class="type1"><?php echo $lang['CLEARANCE']; ?></a></li>

                    </ul>
                </nav>
            </section>
       </div>
    </body>
</html>
