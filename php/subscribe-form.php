<?php
    include "contact-form.php";
    if(checkState()){
        $to = 'did697400@gmail.com';
        $headers = "From: $email";
        mail($to,"Subscriber",$_POST['email'],$headers);
        echo '<script>window.location = "https://mysparkplug.org/" </script>';
    }else{
        echo "Eror while sending email";
    }
    function checkState(){
        if (empty($_POST["c-email"])) {
            echo "Email is required";
            return false;
        } else {
            $email = test_input($_POST["c-email"]);
            // Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            return false;
            }    
        }
    }
?>