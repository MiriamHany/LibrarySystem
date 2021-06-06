<?php
    session_start();
    $username ="User";
    $email ="";
    $uid="";
    $type=""; 
    $password="";
    $errors = array();

    //connect to the database
    $db= new mysqli('localhost', 'root', '' ,'regestration') or die("couldn't connect to database");
    
// REGISTER USER
if (isset($_POST['reg_user'])) 
{
  // receive all input values from the form
  $username = mysqli_real_escape_string($db,$_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $uid = mysqli_real_escape_string($db, $_POST['uid']);
  $type = mysqli_real_escape_string($db,$_POST['type']);
  $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  // form validation: ensure that the form is correctly filled ...
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required");}
  if (empty($uid)) { array_push($errors, "Id is required");}
  if (empty($type)) { array_push($errors, "Type is required"); }
  if (empty($password_1)) {array_push($errors, "Password is required");}
  if ($password_1 != $password_2) { array_push($errors, "The two passwords doesn't match");}
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {array_push($errors, "Username already exists");}
    if ($user['email'] === $email) {array_push($errors, "Email already exists");}
    if ($user['uid'] === $uid) { array_push($errors, "Id already exists");}
  }
  
 
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO users (username, email, uid, type, password) 
          VALUES('$username', '$email', '$uid', '$type', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username']=$username;
    setcookie($username,$password, time() + (86400 * 30), "/"); // 86400 = 1 day
    
    header('location: login.php');
  }
}
 //login user 
 if (isset($_POST['login_user'])) {
  $username= mysqli_real_escape_string($db, $_POST['username']);
  $password= mysqli_real_escape_string($db, $_POST['password']);
  if(empty($username)) {array_push($errors ,"Username is required");}
  if(empty($password)) {array_push($errors ,"Password is required");}
 
if (count($errors) == 0){
  $password =md5($password);
  $query= "SELECT * FROM users WHERE username='$username' AND password= '$password' ";
  $results = mysqli_query($db,$query);
  if(mysqli_num_rows($results))  {
    $row= mysqli_fetch_array($results);
    $type=$row['type'];
    if($type=='Student' || $type=='student')
    {
      $_SESSION['username'] =$username;
      header('location: student.php');
    }
    else if($type=='Admin' || $type=='admin')
    {
      $_SESSION['username'] =$username;
      header('location: admin.php');
    }
  }
  else{
    array_push($errors ,"Wrong Username/ Password..Please try again");
  }
}
}
?>