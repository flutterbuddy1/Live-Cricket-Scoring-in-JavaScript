<?php session_start(); 
if(isset($_SESSION['id'])){
       ?>
    <script>window.location.replace('index.php');</script>
    <?php
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

	<div class="d-flex justify-content-center align-items-center" style="height:100vh;width:100%;">
      <form method="POST" action="login.php">
		<h1>Login</h1>
		<input type="password" name="pass" class="form-control" placeholder='Enter Password To Enter'>
		<button class="btn btn-primary mt-2" name="login">Login</button>
	   </form>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>	
</body>
</html>
<?php

$con = mysqli_connect('localhost','root','','cricket');
if(isset($_POST['login'])){
    $pass = mysqli_real_escape_string($con,$_POST['pass']);
    $select = "SELECT * FROM cric_match";
    $queryFetch = mysqli_query($con,$select);
    $fetch = mysqli_fetch_assoc($queryFetch);
    
    if($fetch['pin']==$pass){
        $_SESSION['id'] = $fetch['id'];
        $_SESSION['time'] = time();
        ?>
        <script>window.location.replace('index.php');</script>
        <?php
    }else{
        ?>
        <script>alert("Please Enter A Valid Password");</script>
        <?php 
    }

}

?>



