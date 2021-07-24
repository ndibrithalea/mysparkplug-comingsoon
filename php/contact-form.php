<?php 
// define variables and set to empty values
$name = $email = $gender = $message = $subject = $website = "";
$state = true;

if(checkInfoSent()){
  $to = 'did697400@gmail.com';
  $headers = "From: $email\r\n";
  $headers .= "Cc: contact@mysparkplug.org";
  mail($to,$_POST['subject'],$_POST['message'],$headers);
  echo '<script>window.location = "https://mysparkplug.org/" </script>';
}else{
  echo checkInfoSent();
  echo "There's an error in your form. Check all user input or enable JS to know more";
}

function checkInfoSent(){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $state = false;
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        echo "Only letters and white space allowed";
        $state = false;
      }
    }
    
    if (empty($_POST["c-email"])) {
      echo "Email is required";
      $state = false;
    } else {
      $email = test_input($_POST["c-email"]);
      // Check if email is valid
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        $state = false;
      }    
    }
  
    if (empty($_POST["message"])) {
      echo "Hey you are empty";
      $state = false;
    } else {
      $message = test_input($_POST["message"]);
    }
  }
  return $state = true;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
