<?php
// include '../connect.php';
$con = mysqli_connect('localhost','root','','cricket');
header('Content-Type: application/json');
$data = array();

	$select="SELECT * FROM cric_match";
	$query = mysqli_query($con,$select);
	while ($row= mysqli_fetch_assoc($query)) 
	{
		$data[]=array("id"=>$row['id'],"Team1"=>$row['team1'],"Team2"=>$row['team2'],"run"=>$row['run'],"wickets"=>$row['wickets'],"live_url"=>$row['live_url'],"batting"=>$row['batting'],"over"=>$row['over_num'],"all"=>$row['all_num'],"over_balls"=>$row['over_balls'],"extraText"=>$row['extra'],"logo1"=>"http://localhost/cricket/admin/images/".$row['team1Logo'],"logo2"=>"http://localhost/cricket/admin/images/".$row['team2Logo']);
	}
	echo json_encode($data);
	
?>