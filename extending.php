<html>
<head>
    <title> Extending book period </title>
    <link rel="stylesheet" type="text/css" href="sty.css">
</head>
<body>
    <center>
    <div class="header">
        <h2>Extending book Period </h2>
    </div>
        <form action = "" method ="POST">

            <input type="text" name="id" placeholder="Enter book's id for search "/><br/>
            <input type="submit" name="search" value="Search" />
            <style>
                input{
                    width: 40%;
                    height: 6%;
                    border: 1px solid black;
                    border-radius: 05px;
                    padding: 8px 15px 8px 15px;
                    margin: 10px 0px 15px 0px;
                    box-shadow: 1px 1px 2px 1px grey;
                }
            </style>
        </form>
        <?php
            $connection =mysqli_connect("localhost","root","") or die("couldn't connect with server");
            $db=mysqli_select_db($connection,"regestration") or die ("couldn't connect with database");
            if(isset($_POST['search']))
            {
                $id =$_POST['id'];
                $query= "SELECT * FROM borrow WHERE id='$id' ";
                $query_run =mysqli_query($connection,$query);
                while($row = mysqli_fetch_array($query_run))
                {
                    ?>
                        <form action="" method="POST">
                        <p>id</p>
                        <input type="text" name="id" value="<?php echo $row['id'] ?>"/> <br>
                        <p>book id</p>
                        <input type="text" name="book_id" value="<?php echo $row['book_id'] ?>"/> <br>
                        <p>user id</p>
                        <input type="text" name="user_id" value="<?php echo $row['user_id'] ?>"/> <br>
                        <p>borrowed at</p>
                        <input type="date" name="borrowed_at" value="<?php echo $row['borrowed_at'] ?>"/> <br>
            
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
    $connection =mysqli_connect("localhost","root","") or die("couldn't connect with server");
    $db=mysqli_select_db($connection,"regestration") or die ("couldn't connect with database");
    if(isset($_POST['update']))
    {
        $book_id=$_POST['book_id'];
        $user_id=$_POST['user_id'];
        $borrowed_at=$_POST['borrowed_at'];
        $query= "UPDATE `borrow` SET  borrowed_at='$_POST[borrowed_at]' WHERE id= '$_POST[id]' ";
        $query_run=mysqli_query($connection,$query);
        function function_alert($message) { 
           echo "<script>alert('$message');</script>"; 
        } 
        if($query_run){
            function_alert("Succesfully Updated"); 
        }
        else{
             function_alert("faile to Updated");
        }
    
    }
    
?>