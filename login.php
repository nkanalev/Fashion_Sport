<html>
    <head>
        <title>FashioN SporT</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="styles/login.css" />
        <?php include_once 'common.php';?>
    </head>
    
    <body>
	<?php include_once 'menu.php';?>
        <section class="login_menu">
            <h3 style="margin-top: 20px"> <?php echo $lang['LOGIN']; ?></h3>
            <form action="process_login.php" method="POST">
                <div>
                    <span> <?php echo $lang['EMAIL']; ?> </span>
                    <input type="email" name="email">
                </div>
                <div>
                    <span> <?php echo $lang['PASSWORD']; ?> </span>
                    <input type="password" name="password" value="">
                </div>
                <div> 
                    <input type="submit" name="submit" value="<?php echo $lang['LOGIN']; ?>"/>
                </div>
            </form>
        </section>
     </body>
</html>

      