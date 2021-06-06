<?php

                 $connection= mysqli_connect("localhost","root","","regestration") or die("couldnt connect with server"); 
             
                if(isset($_POST['add']))
                {
                   extract($_POST);
                    $bookname =$_POST['bookname'];
                    $price =$_POST['price'];
                    $author =$_POST['author'];
                    $query_run =  mysqli_query($connection,"INSERT INTO  borrow (book_id,user_id,borrowed_at) VALUES ('$bookname','$price' ,'$author') ");
                    if($query_run)
                    {
                        echo '<script> alert(" Data inserted")</script>';
                    }else
                    {
                        echo '<script> alert(" Data Not inserted")</script>';
                    }
                }
?>
<html>
<head>
<title> Add book </title>
<link rel="stylesheet" type="text/css" href="newstyle.css">
<style type="text/css">
    .srch
    {
      padding-left: 1000px;
    }
    
    body {
           font-family: "Lato", sans-serif ;
            transition: background-color .5s;
            line-height:1;    
            }        
       table {
        border-collapse: collapse;
        width: 80%;
      }
    th, td {
        text-align: left;
        padding: 8px;
      }
    tr:nth-child(even){background-color: #f2f2f2}
    th {
      background-color: #4CAF50;
      color: white;
    }
    input[type=text] {
        width: 20%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
      }
    input[type=text]:focus {
        border: 3px solid #555;
      }
    button{
      width: 20%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
      }
    button[type=text]:focus {
        border: 3px solid #555;
      }
  </style>
</head>
   <body>
<div class="main" style="text-align: center;">
<h1>List of Books</h1>
<table  class='table table-bordered table-hover' >
  <tr style='background-color: #6db6b9e6'>
    <th>Id</th>
    <th>BookName</th>
    <th>Author</th>
    <th>Price</th>
 </tr>
<?php
$connection= mysqli_connect("localhost","root","","regestration") or die("couldnt connect with server");
$sql= "SELECT * FROM books";
$result =$connection->query($sql);
if($result-> num_rows > 0){
  while($row =$result-> fetch_assoc()) {
    echo "<tr><td>". $row["id"]."</td><td>". $row["bookname"] ."</td><td>". $row["author"]."</td><td>".$row["price"]."</td><tr>";
  }
  echo "</table>";
}
else{
  echo "0 result";
}
?>
</table>
<div class="main" style="text-align: center;">
<h1>List of Users</h1>
<table  class='table table-bordered table-hover' >
  <tr style='background-color: #6db6b9e6'>
    <th>Id</th>
    <th>UserName</th>
    <th>Email</th>
    <th>uid</th>
 </tr>
<?php
$connection= mysqli_connect("localhost","root","","regestration") or die("couldnt connect with server");
$sql= "SELECT id,username,email,uid FROM users";
$result =$connection->query($sql);
if($result-> num_rows > 0){
  while($row =$result-> fetch_assoc()) {
    echo "<tr><td>". $row["id"]."</td><td>". $row["username"] ."</td><td>". $row["email"]."</td><td>".$row["uid"]."</td><tr>";
  }
  echo "</table>";
}
else{
  echo "0 result";
}
?>
</table>
</div>
   <div class="header">
    <h2>Register here</h2>
  </div>
  
    <form method="post" action="">
    <div class="input-group">
        <input type="text" name="bookname" placeholder="Enter the book id" required /><br/>
    </div>
      <div class="input-group">
        <input type="text" name="price" placeholder="Enter the user id" required /><br/>
    </div>
      <div class="input-group">
        <input type="date" name="author" placeholder="Enter period" required /><br/>
    </div>
      <div class="input-group" style="color: black;">
        <input type="submit" name="add" value="add" />    
    </div>
        
    </form>
 </body>
 </html>