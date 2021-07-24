<?php
    if(checkEmailState()){
        $to = 'did697400@gmail.com';
        $email = $_POST['email'];
        $headers = "From: $email\r\n";
        $headers .= "Cc: contact@mysparkplug.org";
        mail($to,"Subscriber",$_POST['email'],$headers);
        echo '<script>window.location = "https://mysparkplug.org/" </script>';
    }else{
        echo "Eror while sending email";
    }
    function checkEmailState(){
        $state = true;
        if (empty($_POST["email"])) {
            echo "Email is required";
            $state = false;
        } else {
            $email = test_input($_POST["email"]);
            // Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            $state = false;
            }    
        }
        return $state;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>