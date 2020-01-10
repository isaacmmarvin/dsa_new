<?php

$con = mysqli_connect("localhost","root","","zac");
if(mysqli_connect_errno()){
    echo "failed to connect". mysqli_connect_errno();
}else{
    echo "sucess";
}
if(isset($_POST)){
    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ','',$fname);//remove space
    $fname = ucfirst(strtolower($fname));//upper case first letter



    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ','',$lname);
    $lname = ucfirst(strtolower($lname));

    $email_1 = strip_tags($_POST['email']);
    $email_1 = str_replace(' ','',$email_1);
    $email_1 = ucfirst(strtolower($email_1));

    $email_2 = strip_tags($_POST['email2']);
    $email_2 = str_replace(' ','',$email_2);
    $email_2 = ucfirst(strtolower($email_2));

    $password_1 = strip_tags($_POST['password']);
   

    $password_2 = strip_tags($_POST['confirm_password']);
    
    if ($email_1 == $email_2){
        if(filter_var($email_2,FILTER_VALIDATE_EMAIL)){
            $email = filter_var($email_2,FILTER_VALIDATE_EMAIL);
            $e_xheck = mysqli_query($con,"SELECT email from users Where email='$email'");

            $num_rows = mysqli_num_rows($e_xheck);
            if ($num_rows >0){
                echo "eamil exists";
            }
        }
    }

}



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
    
    <input type="text" name="reg_fname" placeholder="firstname" required > 
   <br>
    <input type="text" name="reg_lname" placeholder="lastname" required > 
    <br>
    <input type="email" name="email" placeholder="email" required > 
    <br>
    <input type="email" name="email2" placeholder="email2" required > 
    <br>
    <input type="password" name="password" placeholder="password" required > 
    <br>
    <input type="password" name="confrim_password" placeholder="confrim password" required > 

    <br>
<input type="submit" value="register" name="register_button">    
    </form>
</body>
</html>