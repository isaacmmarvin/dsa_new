<?php
require 'config/config.php';
require 'includes/from_handlers/register_handler.php';



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<body>
    <form action="register.php" method="post">
    
    <input type="text" name="reg_fname" placeholder="firstname"  value="<?php echo (isset($_SESSION['reg_fname'])) ? $_SESSION['reg_fname'] : ""; ?>"  required > 
   <br>
   
    <?php echo (in_array("your first name must be betweeen 25 and 2 characters<br>",$errors)) ? "your first name must be betweeen 25 and 2 characters<br>" : ""; ?>

    <input type="text" name="reg_lname" placeholder="lastname"  value="<?php echo (isset($_SESSION['reg_lname'])) ? $_SESSION['reg_lname'] : ""; ?>" required > 
    <br>
    <?php echo (in_array("your first name must be betweeen 25 and 2 characters<br>",$errors)) ? "email in use<br>" : ""; ?>
    <input type="email" name="email" placeholder="email"  value="<?php echo (isset($_SESSION['reg_email'])) ? $_SESSION['reg_email'] : ""; ?>" required > 
    <br>
    <?php echo (in_array("invalid format<br>",$errors)) ? "invalid format<br>" : ""; ?>

    <?php echo (in_array("email in use<br>",$errors)) ? "email in use<br>" : ""; ?>
    <input type="email" name="email2" placeholder="email2"  value="<?php echo (isset($_SESSION['reg_email2'])) ? $_SESSION['reg_email2'] : ""; ?>" required > 
    <br>
    <input type="password" name="password" placeholder="password" required > 
    <br>
    <input type="password" name="confirm_password" placeholder="confrim password" required > 

    <br>
    <?php echo (in_array("your password must be between 5 and 30 characters<br >",$errors)) ? "your password must be between 5 and 30 characters<br >" : ""; ?>

<input type="submit" value="register" name="register_button">    
<?php echo (in_array("<span style='color:#14c800;'>you're all set go ahead and login</span><br>
",$errors)) ? "<span style='color:#14c800;'>you're all set go ahead and login</span><br>
" : ""; ?>

    </form>
</body>
</html>