<?php 
$errors = array();

  if(isset($_POST) && !empty($_POST)){
    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ','',$fname);//remove space
    $fname = ucfirst(strtolower($fname));//upper case first letter
    $_SESSION['reg_fname'] = $fname;



    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ','',$lname);
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lname'] = $lname;

    $email_1 = strip_tags($_POST['email']);
    $email_1 = str_replace(' ','',$email_1);
    $email_1 = ucfirst(strtolower($email_1));
    $_SESSION['reg_email'] = $email_1;

    $email_2 = strip_tags($_POST['email2']);
    $email_2 = str_replace(' ','',$email_2);
    $email_2 = ucfirst(strtolower($email_2));
    $_SESSION['reg_email2'] = $email_2;

    $password_1 = strip_tags($_POST['password']);
   

    $password_2 = strip_tags($_POST['confirm_password']);
    
    if ($email_1 == $email_2){
        if(filter_var($email_2,FILTER_VALIDATE_EMAIL)){
            $email = filter_var($email_2,FILTER_VALIDATE_EMAIL);
            $e_xheck = mysqli_query($con,"SELECT email from users Where email='$email'");

            $num_rows = mysqli_num_rows($e_xheck);
            if ($num_rows >0){
                array_push($errors,"email in use<br>");
            }
        }else{
            array_push($errors, "invalid format<br>");

        }
    }else{
        array_push($errors, 'emails dont match<br>');
    }
    if(strlen($fname) >25 || strlen($fname) < 2){
        array_push($errors, 'your first name must be betweeen 25 and 2 characters<br>');

    }
    if(strlen($lname) >25 || strlen($lname) < 2){
        array_push($errors, ' your last name must be betweeen 25 and 2 characters<br>');
        
    }
    if( $password_2 != $password_1){
        array_push($errors, "your passwords dont match<br>");
    }else{
        if(preg_match('/[^A-Za-z0-9]/',$password_1)){
            array_push($errors, "you password can only contain english characters or numbers<br>");
        }
    }
    if(strlen($password_1) >30 || strlen($password_1) < 5){
        array_push($errors, "your password must be between 5 and 30 characters<br >");
    }
    if(empty($errors)){
        $password = md5($password_1);
        //generating  user name
        $username = strtolower($fname."_".$lname);
        $check_username = mysqli_query($con,"SELECT username from users where username='$username'");
        $i = 0;
        while(mysqli_num_rows($check_username) != 0){
            $i++;
            $username = $username . "_" . $i;
            $check_username = mysqli_query($con,"SELECT username from users where username='$username'");
        }
        // profile picture assignmnet
        $rand = rand(1,2);
        if ($rand == 1)
         $profile_pic ="assests/images/profile_pics/defaults/head_deep_blue.png";
        else if ($rand== 2)
         $profile_pic ="assests/images/profile_pics/defaults/head_deep_blue.png";
        
         $query = mysqli_query($con,"INSERT into users values('','$fname','$lname','$username','$email','$password','','$profile_pic','0','0','no',',')");
         array_push($errors,"<span style='color:#14c800;'>you're all set go ahead and login</span><br>");
         $_SESSION['reg_fname'] = "";

         $_SESSION['reg_lname'] = "";
         $_SESSION['reg_email'] = "";
         $_SESSION['reg_email2'] = "";
       
    }
    
}
?>