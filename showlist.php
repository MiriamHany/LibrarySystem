<html>
<head>
    <title> SEarch data and pdate it </title>
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
            <h2>Showlist of books by same author</h2>
        </div>
        <form action = "" method ="POST">

            <input type="text" name="id2" placeholder="Enter book's author for search "/><br/>
            <input type="submit" name="search" value="Search" />
        </form>
        <?php
            $connection =mysqli_connect("localhost","root","") or die("couldn't connect with server");
            $db=mysqli_select_db($connection,"regestration") or die ("couldn't connect with database");
            if(isset($_POST['search']))
            {
                $author=$_POST['id2'];
                $query= "SELECT bookname,author,price FROM books WHERE  author='$author' ";
                $query_run =mysqli_query($connection,$query);
                while($row = mysqli_fetch_array($query_run))
                {
                    ?>
                        <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/> <br>
                        <p>Book Name</p>
                        <input type="text" name="bookname" value="<?php echo $row['bookname'] ?>"/> <br>
                        <p>Author</p>
                        <input type="text" name="author" value="<?php echo $row['author'] ?>"/> <br>
                        <p>Price</p>
                        <input type="text" name="price" value="<?php echo $row['price'] ?>"/> <br>
        
                        </form>

                    <?php
                }
            }
        ?>

    </center>
</body>
</html>