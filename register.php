<?php
  include 'common.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8">
        <title> Fashion Sport </title>
        <link rel = "stylesheet" type = "text/css" href="styles/register.css"/>
    </head>
        
    <body>
        <?php include_once 'menu.php';?>
        <form action="process_register.php" method="POST">  
            <section class="register_form">
                <h3 style="margin-top: 20px"> <?php echo $lang['REGISTRATION']; ?> </h3>
                    <article class="mailandpass">
                        <h4> <?php echo $lang['CUSTOMER_INFORMATION']; ?> </h4>

                            <div>
                                <span> <?php echo $lang['EMAIL']; ?> </span>
                                <input type="email" name="email" value="">
                            </div>

                            <div>
                                <span> <?php echo $lang['PASSWORD']; ?> </span>
                                <input type="password" name="password" value="">
                            </div>

                            <div>
                                <span> <?php echo $lang['CONFIRM_PASSWORD']; ?> </span>
                                <input type="password" name="confirm_password" value="">
                            </div>

                    </article>
                    <article class="personal_info">
                        <h4> <?php echo $lang['CОNTACT_ADDRESS']; ?> </h4>

                        <div class="left">
                            <div>
                                <span> <?php echo $lang['FIRST_NAME']; ?> </span>
                                <input type="text" name="first_name" value="">
                            </div>

                            <div>
                                <span> <?php echo $lang['LAST_NAME']; ?> </span>
                                <input type="text" name="last_name" value="">
                            </div>

                            <div>
                                <span> <?php echo $lang['TELEPHONE_NUMBER']; ?> </span>
                                <input type="tel" name="telephone" value="">
                            </div>

                            <div>
                                <span> <?php echo $lang['COUNTRY']; ?> </span>    
                                <input type="text" name="country" value="">
                            </div>
                        </div>    

                        <div class="right">
                            <div>
                                <span> <?php echo $lang['AREA']; ?> </span>
                                <input type="text" name="area" value="">
                            </div>

                            <div>
                                <span> <?php echo $lang['CITY']; ?> </span>
                                <input type="text" name="city" value="">
                            </div>

                            <div>
                                <span> <?php echo $lang['POST_CODE']; ?> </span>
                                <input type="text" name="post_code" value="">
                            </div>

                            <div>
                                <span> <?php echo $lang['ADDRESS']; ?> </span>
                                <input type="text" name="address" value="">
                            </div>
                        </div>
                    </article>
                </div>

                <div class="clearfix"></div>

                <div class="buttonstyle">
                    <button type="submit"> <?php echo $lang['REGISTER']; ?> </button>
                </div>
            </section>
         </form>
    </body>
    
</html>