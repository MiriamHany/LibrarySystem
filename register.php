<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Library Sign up</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="header">
    <h2>Signing up</h2>
  </div> 
    
  <form method="post" action="register.php">
  
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" required>
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" required>
    </div>
    <div class="input-group">
      <label>Id</label>
      <input type="text" name="uid" required>
    </div>
    <div class="input-group">
      <label>Type</label>
      <input type="text" name="type" required>
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1" required>
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2" required>
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Sign up</button>
    </div>
    <p>
        Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
</body>
</html>