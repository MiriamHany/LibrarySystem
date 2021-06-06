<html>
    <head>
        <title> test page</title>
        <link rel="stylesheet" type="text/css" href="in.css">
       
</head>
<body>
    <center>
<div class="header">
    <h2> To Return a Book</h2>
  </div>
  <form>
       <div class="input-group">
          <input type="text" name="book_id" placeholder="Enter the book id" /><br/>
       </div>

      <div class="input-group">
        <button type="submit" class="btn" name="return">Return</button>
     </div>
      </form>
      <?php
    $connection =mysqli_connect("localhost","root","") or die("couldn't connect with server");
    $db=mysqli_select_db($connection,"regestration") or die ("couldn't connect with database");
    if(isset($_POST['return']))
    {
        $query_run=mysqli_query($connection,"DELETE FROM borrow where  book_id='$_post[book_id]'; ");
        if($query_run){
            echo '<script> alert("DATA UPDATED") <script>';
        }
        else{
            echo '<script> alert("DATA NOT UPDATED") <script>';
        }
    
    }
    
?>
</center>
</body>
</html>