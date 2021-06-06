<html>
<head>
    <title> Search data and update it </title>
    <link rel="stylesheet" type="text/css" href="sty.css">
    <style>
        input{
            width: 40%;
            height: 6%;
            border: 1px;
            border-radius: 05px;
            padding: 8px 15px 8px 15px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px grey;
        }
    </style>
</head>
<body>
    <center>
        <div class="header">
            <h2>Search user's data and Update it </h2>
        </div>
        <form action = "update.php" method ="POST">

            <input type="text" name="username" placeholder="Enter username for search "/><br/>
            <input type="submit" name="search" value="Search" /><br>
        </form>
        <?php
            $connection =mysqli_connect("localhost","root","") or die("couldn;t connect with server");
            $db=mysqli_select_db($connection,"regestration") or die ("couldn't connect with database");
            if(isset($_POST['search']))
            {
                $username =$_POST['username'];
                $query= "SELECT * FROM users WHERE username='$username' ";
                $query_run =mysqli_query($connection,$query);
                while($row = mysqli_fetch_array($query_run))
                {
                    ?>
                        <form action="" method="POST">
                            <p>Select and Edit</p>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/> <br>
                        <p>Username</p>
                        <input type="text" name="username" value="<?php echo $row['username'] ?>"/> <br>
                        <p>Email</p>
                        <input type="text" name="email" value="<?php echo $row['email'] ?>"/> <br>
                        <p>ID</p>
                        <input type="text" name="uid" value="<?php echo $row['uid'] ?>"/> <br>
                        <p>Type</p>
                        <input type="text" name="type" value="<?php echo $row['type'] ?>"/> <br>
                        <p>Password</p>
                        <input type="text" name="password" value="<?php echo $row['password'] ?>"/> <br>
                        <input type="submit" name="update" value="update">;
                        </form>

                    <?php
                }
            }
        ?>
    </center>
</body>
</html>
<?php
    $connection =mysqli_connect("localhost","root","") or die("couldn;t connect with server");
    $db=mysqli_select_db($connection,"regestration") or die ("couldn't connect with database");
    if(isset($_POST['update']))
    {
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $type=$_POST['type'];
        $uid=$_POST['uid'];
        $id=$_POST['id'];
        $query= "UPDATE `users` SET username='$_POST[username]' , email='$_POST[email]' , password='$_POST[password]' , type='$_POST[type]' , 
        uid='$_POST[uid]' WHERE id= '$_POST[id]' ";
        $query_run=mysqli_query($connection,$query);
        function function_alert($message) { 
           echo "<script>alert('$message');</script>"; 
        } 
        if($query_run)
        {
            
        function_alert("Succesfully Updated"); 
             
        }
        else{
        
             function_alert("faile to Updated");
             
        }
    }
    
?>