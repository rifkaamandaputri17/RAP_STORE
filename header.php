<!DOCTYPE html>
<html>
    <head>
        <title>Login dan Register</title>
        <link rel="stylesheet" href="webstyle.css">
    </head>
    <body>
        <header>
            <h1>Login dan Register</h1>
      
     
        <nav>
            <a href="index.php">Home</a>

            <?php  if( !isset($_SESSION['user'])) { ?>
                <a href="register.php">register</a>
            <a href="login.php">login</a>
                
           <?php } else { ?>
           <a href="logout.php">LOGOUT</a> 
          <?php } ?>


            
            
        </nav>
</header>
   