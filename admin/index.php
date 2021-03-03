<?php
session_start();
if(!isset($_SESSION['id'])){
       ?>
    <script>window.location.replace('login.php');</script>
    <?php
}
$con = mysqli_connect('localhost','root','','cricket');

$select = "SELECT * FROM cric_match";
$queryFetch = mysqli_query($con,$select);
$fetch = mysqli_fetch_assoc($queryFetch);


if(time() - $_SESSION['time'] > 900){
    ?>
    <script>
        alert('Time Over Please Login Again');
    </script>
    <?php
    header('location:logout.php');
    exit();
}else{
    $_SESSION['timestamp'] = time(); //set new timestamp
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="refresh" content="900;url=logout.php" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cricket Admin</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    


	<div class="container_panel">
	    
		<div class="section">
			<div class="navbar bg-info">
				<h3 class="text-center w-100">Cricket Admin</h3>
			</div>
			<form action="index.php" method="POST" id="form" enctype="multipart/form-data">
			        <div class="input-group mt-2">
                        <input type="text" name="liveUrl" class="form-control" placeholder="Enter Video Id .ex-v=hoNb6HuNmU0" value="<?php echo($fetch['live_url']); ?>">
                        <button type="submit" name="add_url" class="btn btn-primary">Add URL</button>
                    </div>
                    
                    <div class="input-group mt-2 mb-2">
                        <input type="text" name="extraText" class="form-control" placeholder="Enter Some Extra Text" value="<?php echo($fetch['extra']); ?>">
                        <button type="submit" name="add_extra" class="btn btn-success">Add Text</button>
                    </div>
			
				<div class="form-control">
					<label>Team 1 Logo</label>
					<input type="file" name="team1Logo" class="form-control">
					<label>Team 2 Logo</label>
					<input type="file" name="team2Logo" class="form-control">
					<button type="submit" name="setLogos" class="btn btn-success mt-2">Set Logos</button>
				</div>

				<div class="input-group p-2 form-control">
				<input class="form-control" type="text" name="team1" placeholder="Enter First Team Name" value="<?php echo($fetch['team1']); ?>">
				<h3><b>V</b>/<strong>S</strong></h3>
				<input class="form-control" type="text" name="team2" placeholder="Enter Second Team Name" value="<?php echo($fetch['team2']); ?>">
				</div>
				<div class="form-control">
					<p>Select Batting Team</p>
				<input type="radio" name="batting" id="<?php echo($fetch['team1']); ?>" id="<?php echo($fetch['team1']); ?>" value="<?php echo($fetch['team1']); ?>">
				<label for="<?php echo($fetch['team1']); ?>"><?php echo($fetch['team1']); ?></label>
				<input type="radio" name="batting" id="<?php echo($fetch['team2']); ?>" value="<?php echo($fetch['team2']); ?>">
				<label for="<?php echo($fetch['team2']); ?>"><?php echo($fetch['team2']); ?></label>

				</div>
				<div class="row m-0 p-0 d-flex justify-content-center align-items-center">
					<h4 class="text-center">RUN</h4>
				<input type="submit" name="one" value="1" class="btn btn-info col-3 m-2">
				<input type="submit" name="two" value="2" class="btn btn-info col-3 m-2">
				<input type="submit" name="three" value="3" class="btn btn-info col-3 m-2">
				<input type="submit" name="four" value="4" class="btn btn-info col-3 m-2">
				<input type="submit" name="six" value="6" class="btn btn-info col-3 m-2">
				<input type="submit" name="out" value="out" class="btn btn-info col-3 m-2">
				<input type="submit" name="out_back" value="out -1" class="btn btn-info col-3 m-2">
				<input type="submit" name="out_add" value="out +1" class="btn btn-info col-3 m-2">
				<input type="submit" name="one_add" value="+1 Run" class="btn btn-info col-3 m-2">
				<input type="submit" name="one_back" value="-1 Run" class="btn btn-info col-3 m-2">
				<input type="submit" name="ball_back" value="-1 Ball" class="btn btn-info col-3 m-2">
				<input type="submit" name="ball_add" value="+1 Ball" class="btn btn-info col-3 m-2">
				<input type="submit" name="over_back" value="-1 Over" class="btn btn-info col-3 m-2">
				<input type="submit" name="over_add" value="+1 Over" class="btn btn-info col-3 m-2">
				<input type="submit" name="dot" value="DOT Ball" class="btn btn-info col-3 m-2">
				<input type="submit" name="resolve" value="Reset" class="btn btn-info col-3 m-2">

				<div class="d-flex justify-content-center align-items-center">
						<button type="submit" name="noball" class="btn btn-info m-2">No Ball</button>
						<button type="submit" name="wball" class="btn btn-info m-2">Wide Ball</button>
					</div>
				</div>
				<input type="submit" name="update" value="Update" class="btn btn-success col-12">
				<a href="logout.php" class="btn btn-danger col-12 mt-2" >Logout</a>
				</div>
			</form>
		</div>
	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>
<?php

if (isset($_POST['one'])) 
{
	$one = $fetch['run'] + 1;
	check_over_ball();
	$update = "UPDATE cric_match SET run='$one',all_num='1' ";
	$query = mysqli_query($con,$update);
		if ($query) {
						?>
			<script>
			    location.replace('./index.php');
			</script>
			<?php
		}
}else{
	if (isset($_POST['two'])){
	$two = $fetch['run'] + 2;
	check_over_ball();
	$update = "UPDATE cric_match SET run='$two',all_num='2'";
	$query = mysqli_query($con,$update);
		if ($query) {
						?>
			<script>
			    location.replace('./index.php');
			</script>
			<?php
		}
}else{
	if (isset($_POST['three'])){
	$three = $fetch['run'] + 3;
	check_over_ball();
	$update = "UPDATE cric_match SET run='$three',all_num='3'";
	$query = mysqli_query($con,$update);
		if ($query) {
						?>
			<script>
			    location.replace('./index.php');
			</script>
			<?php
		}
}else{
	if (isset($_POST['four'])){
	$four = $fetch['run'] + 4;
	check_over_ball();
	$update = "UPDATE cric_match SET run='$four',all_num='4'";
	$query = mysqli_query($con,$update);
		if ($query) {
						?>
			<script>
			    location.replace('./index.php');
			</script>
			<?php
		}
}else{
	if (isset($_POST['six'])){
	$six = $fetch['run'] + 6;
	check_over_ball();
	$update = "UPDATE cric_match SET run='$six',all_num='6'";
	$query = mysqli_query($con,$update);
		if ($query) {
						?>
			<script>
			    location.replace('./index.php');
			</script>
			<?php
		}
}else{
	if (isset($_POST['out'])){
	$out = $fetch['wickets'] + 1;
	check_over_ball();
	$update = "UPDATE cric_match SET wickets='$out',all_num='OUT' ";
	$query = mysqli_query($con,$update);
		if ($query) {
						?>
			<script>
			    location.replace('./index.php');
			</script>
			<?php
		}
}else{
	if (isset($_POST['update'])){
	$team1 = $_POST['team1'];
	$team2 = $_POST['team2'];
	$batting = $_POST['batting'];
	$update = "UPDATE cric_match SET team1='$team1',team2='$team2',batting='$batting' ";
	$query = mysqli_query($con,$update);
	if ($query) {
						?>
			<script>
			    location.replace('./index.php');
			</script>
			<?php
		}

}else{
	if (isset($_POST['resolve'])){
	$reset_data = "UPDATE cric_match SET wickets='0',run='0',over_num='0',over_balls='0',batting='Toss',all_num='Waiting...' ";
	$query = mysqli_query($con,$reset_data);
		if ($query) {
						?>
			<script>
			    location.replace('./index.php');
			</script>
			<?php
		}
}else{
	if (isset($_POST['over'])){
	$over = $fetch['over'] + 1;
	$update = "UPDATE cric_match SET over_num='$over'";
	$query = mysqli_query($con,$update);
		if ($query) {
						?>
			<script>
			    location.replace('./index.php');
			</script>
			<?php
		}
}else{
	if (isset($_POST['over_balls'])){

}else{
	if (isset($_POST['setLogos'])){
		$logo1 = $_FILES['team1Logo']['name'];
		$logo2 = $_FILES['team2Logo']['name'];
		$set1= move_uploaded_file($_FILES['team1Logo']['tmp_name'] , "images/".$logo1);
		$set1= move_uploaded_file($_FILES['team2Logo']['tmp_name'] , "images/".$logo2);
		$update = "UPDATE cric_match SET team1Logo='$logo1',team2Logo='$logo2' ";
		$query = mysqli_query($con,$update);
		if ($query) {
			?>
			<script>
			    location.replace('./index.php');
			</script>
			<?php
		}

	}else{
	    if(isset($_POST['wball'])){
	        $one = $fetch['run'] + 1;
        	$update = "UPDATE cric_match SET run='$one' ,all_num='Wide' ";
        	$query = mysqli_query($con,$update);
        		if ($query) {
        						?>
        			<script>
        			    location.replace('./index.php');
        			</script>
        			<?php
        		}
	    }else{
	    if(isset($_POST['dot'])){
	        check_over_ball();
        	$update = "UPDATE cric_match SET all_num='0' ";
        	$query = mysqli_query($con,$update);
        		if ($query) {
        						?>
        			<script>
        			    location.replace('./index.php');
        			</script>
        			<?php
        		}
	    }else{
	        if(isset($_POST['noball'])){
	        $one = $fetch['run'] + 1;
        	$update = "UPDATE cric_match SET run='$one' ,all_num='No Ball' ";
        	$query = mysqli_query($con,$update);
        		if ($query) {
        						?>
        			<script>
        			    location.replace('./index.php');
        			</script>
        			<?php
        		}
	    }else{
	        if(isset($_POST['add_url'])){
	        $url = $_POST['liveUrl'];
        	$update = "UPDATE cric_match SET live_url='$url' ";
        	$query = mysqli_query($con,$update);
        		if ($query) {
        						?>
        			<script>
        			    location.replace('./index.php');
        			</script>
        			<?php
        		}
	    }else{
	        if(isset($_POST['add_extra'])){
	        $text = $_POST['extraText'];
	        $update = "UPDATE cric_match SET extra='$text'";
        	$query = mysqli_query($con,$update);
        		if ($query) {
        						?>
        			<script>
        			    location.replace('./index.php');
        			</script>
        			<?php
        		}
	        }else{
	            if(isset($_POST['out_back'])){
	                $out = $fetch['wickets'] - 1;
                	$update = "UPDATE cric_match SET wickets='$out'";
                	$query = mysqli_query($con,$update);
                		if ($query) {
                						?>
                			<script>
                			    location.replace('./index.php');
                			</script>
                			<?php
                		}
	            }else{
	            if(isset($_POST['one_back'])){
	                $run = $fetch['run'] - 1;
                	$update = "UPDATE cric_match SET run='$run'";
                	$query = mysqli_query($con,$update);
                		if ($query) {
                						?>
                			<script>
                			    location.replace('./index.php');
                			</script>
                			<?php
                		}
	            }else{
	            if(isset($_POST['one_add'])){
	                $run = $fetch['run'] + 1;
                	$update = "UPDATE cric_match SET run='$run'";
                	$query = mysqli_query($con,$update);
                		if ($query) {
                						?>
                			<script>
                			    location.replace('./index.php');
                			</script>
                			<?php
                		}
	            }else{
	            if(isset($_POST['out_add'])){
	                $out = $fetch['wickets'] + 1;
                	$update = "UPDATE cric_match SET wickets='$out'";
                	$query = mysqli_query($con,$update);
                		if ($query) {
                						?>
                			<script>
                			    location.replace('./index.php');
                			</script>
                			<?php
                		}
	            }else{
	            if(isset($_POST['ball_add'])){
	                check_over_ball();
	            }else{
	            if(isset($_POST['over_back'])){
	                $over = $fetch['over_num'] - 1;
                	$update = "UPDATE cric_match SET over_num='$over'";
                	$query = mysqli_query($con,$update);
                		if ($query) {
                						?>
                			<script>
                			    location.replace('./index.php');
                			</script>
                			<?php
                		}
	            }else{
	            if(isset($_POST['over_add'])){
	                $over = $fetch['over_num'] + 1;
                	$update = "UPDATE cric_match SET over_num='$over'";
                	$query = mysqli_query($con,$update);
                		if ($query) {
                						?>
                			<script>
                			    location.replace('./index.php');
                			</script>
                			<?php
                		}
	            }else{
	            if(isset($_POST['ball_back'])){
	                over_ball_minus();
	            }
	        }
	        }
	        }
	        }
	        }
	        }
	        }
	        }
	    }
	}
}
}
}
}
}
}
}
}
}
}
}
}
}

function over_ball_minus(){
    global $con;
	$select = "SELECT * FROM cric_match";
	$queryFetch = mysqli_query($con,$select);
	$fetch = mysqli_fetch_assoc($queryFetch);

	if ($fetch['over_balls']=='0') {
	$over = $fetch['over_num'] - 1;
	$update2 = "UPDATE cric_match SET over_num='$over',over_balls='5' ";
	$query2 = mysqli_query($con,$update2);
	}else{
	$over_balls = $fetch['over_balls'] - 1;
	$update = "UPDATE cric_match SET over_balls='$over_balls'";
	$query = mysqli_query($con,$update);
	}
}


function check_over_ball(){
	global $con;
	$select = "SELECT * FROM cric_match";
	$queryFetch = mysqli_query($con,$select);
	$fetch = mysqli_fetch_assoc($queryFetch);

	if ($fetch['over_balls']=='5') {
	$over = $fetch['over_num'] + 1;
	$update2 = "UPDATE cric_match SET over_num='$over',over_balls='0' ";
	$query2 = mysqli_query($con,$update2);
	}else{
	$over_balls = $fetch['over_balls'] + 1;
	$update = "UPDATE cric_match SET over_balls='$over_balls'";
	$query = mysqli_query($con,$update);
	}
}


?>