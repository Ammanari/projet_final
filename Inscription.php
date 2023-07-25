<?php
$name = $lname = $username= $password = $cpassword = "";
$name_err = $lname_err = $username_err= $password_err =  $cpassword_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $input_name = trim($_POST["firstName"]);
  if(empty($input_name)){
    $name_err = "Please enter a name.";
  } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    $name_err = "Please enter a valid name.";
  } else{
    $name = $input_name;
  }

  $input_lname = trim($_POST["lastName"]);
  if(empty($input_lname)){
    $lname_err = "Please enter a name.";
  } elseif(!filter_var($input_lname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    $lname_err = "Please enter a valid name.";
  } else{
    $lname = $input_lname;
  }

  $input_username = trim($_POST["username"]);
  if(empty($input_username)){
    $username_err = "Please enter a username.";
  } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]{8,}$/")))){
    $username_err = "Please enter a valid username.";
  } else{
    $username = $input_username;
  }

  $input_password = trim($_POST["password"]);
  if(empty($input_password)){
    $password_err = "Please enter a password.";
  } elseif(!filter_var($input_password, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]{8,}$/")))){
    $password_err = "Please enter a valid password.";
  } else{
    $password = $input_password;
  }

  $input_cpassword = trim($_POST["confirmPassword"]);
  if(empty($input_cpassword)){
    $cpassword_err = "Please enter a password.";
  } elseif(!filter_var($input_cpassword, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]{8,}$/")))){
    $cpassword_err = "Please enter a valid password.";
  } else{
    $cpassword = $input_cpassword;
  }

  if(trim($input_password) != trim($input_cpassword)|| trim($input_cpassword) != trim($input_password)){
    $cpassword_err = "Passwords do not match.";
  }

  if(empty($name_err) && empty($lname_err) && empty($username_err) && empty($password_err) && empty($cpassword_err)){
    $sql = "INSERT INTO users (fName, lName, userName, password) VALUES (?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_lname, $param_username, $param_password);

      $param_name = $name;
      $param_lname = $lname;
      $param_username = $username;
      $param_password = $password;

      if(mysqli_stmt_execute($stmt)){
        echo "Account created successfully.";
        header("location: formulaireAccueil.html");
        exit();
      } else{
        echo "Something went wrong. Please try again later.";
      }
    }
    mysqli_stmt_close($stmt);
  }
}
