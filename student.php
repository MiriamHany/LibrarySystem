<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header("location : login.php");
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location : login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="in.css">
</head>
<body>
    <div class="header">
        <h2>Home Page</h2>
    </div>
    <?php
    if(isset($_SESSION['success'])) : ?>
    <div>
        <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </h3>
    </div>
<?php endif ?>
<!--User Login Information-->
<form method="post" action="student.php">
<div class="welcome">
<?php if(isset($_SESSION['username'])) : ?>
    <h3>Welcome Student <strong><?php echo $_SESSION['username']; ?></strong></h3>
    <button><a href="student.php?logout='1'"></a></button>
    <br>
      <div class="btn">
      <button type="submit" class="btn" name="reg_user"><a href="update.php">Update User Details</a></button>
      </div>
      <br>
      <div class="btn">
      <button type="submit" class="btn" name="reg_user"><a href="search.php">Browse Book</a></button>
      </div>
      <br>
      <div class="btn">
      <button type="submit" class="btn" name="reg_user"><a href="showlist.php">Show list of books</a></button>
      </div>
      <br>
      <div class="btn">
      <button type="submit" class="btn" name="reg_user"><a href="operation.php">Perform Operations on books</a></button>
        </div>
        <br>
        <div class="button">
      <button type="submit" class="button" name="reg_user"><a href="login.php">Log out</a></button>
      </div>
<?php endif ?>
</body>
</div>
</form>
</body>
</html>