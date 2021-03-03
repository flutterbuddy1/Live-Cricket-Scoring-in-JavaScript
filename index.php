<?php
$con = mysqli_connect('localhost','root','','cricket');
	$select="SELECT * FROM cric_match";
	$query = mysqli_query($con,$select);
	$row= mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="robots" content="index, follow" />
	<link rel="canonical" href="https://vccbijuri.in/" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VCC Bijuri - Official Website of Vivekanada Cricket Club</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<meta name="google-site-verification" content="LJ1ooUrUEOMh9UPqXUxv57OfqalUlktOPIHCDuBfYMQ" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="description" content="This is the official website of VCC Bijuri.">
	<meta name="keywords" content="vcc bijuri, live bijuri, cricket in bijuri, bijuri tournament, vcc npl, bijuri, live score vcc" >

	
	
	
</head>
<body>
    
    <nav class="navbar navbar-static navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="https://vccbijuri.in/">VCC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./prize.jpeg">Prize</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./team.jpeg">Teams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="tel:919584592773">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./summary.html">Match Summary</a>
        </li>
        
    </div>
  </div>
</nav>


	<div class="container_panel">
	    <div class="card" style="height:45px; width:90%; margin-top:20px; margin-bottom:20px;  display:flex;justify-content: center;align-items: center; background:lightblue; ">
		    
		    
		        <marquee behavior="scroll" direction="left" id="extra">
		            <!--get data from api-->
		        </marquee>
		        <marquee behavior="scroll"  direction="left" scrollamount="5">To see the Match Summary <a style="color:black;" href="./summary.html">Click Here</a></marquee>
           
		    
		</div>
	    
	    <!-- <img style="width:80%;height:100px; margin-top:30px; margin-bottom:20px; " src='banner.jpeg'> -->
				<div class="text-center w-100 d-flex justify-content-center align-items-center">

					<div>
					<img class="teamLogo" id="logo1">
					<br>
					<span id="team1"></span>
					</div>
					<strong class="m-3"> V/S </strong>
					<div>
					<img class="teamLogo" id="logo2">
					<br>
					<span id="team2"></span>
					</div>
				</div>
		<div class="section">
			<div class="video_container">
				<iframe width="100%" height="250" id="liveVideo" src="https://www.youtube.com/embed/<?php echo $row['live_url']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="main_container">
				<div class="main">
				<h5 id="batting"></h5>
						    <div class='live_text'> L I V E </div>
					<h5 style="height:100%;width:100%; background:lightblue;">:<span id="run"></span>/<span id="wickets"></span></h5>

					<h5 class="over_section">
						<div>Overs: <span id="over"></span>.<span id="balls"></span>
						</div>
					</h5>
				</div>
			</div>
		</div>
		
		
		
		<div class="container">
		<div class="card" style="height:100px; width:100%; margin-top:20px; margin-bottom:20px;  display:flex;justify-content: center;align-items: center; ">
		    <h1 id="fun_num" style="font-size:50px;">Waiting...</h1>
		    <!--
		    <div class="card">Ward No. 4 Won The Match </div>
		    -->
		</div>
	</div>
	</div>
	<!--
	<iframe src='https://chauka.in/index.php/scoreboard/display_scoreboard/212686' style="height:100vh;width:100%;"></iframe> -->

	    	<!-- Footer -->
<footer class="footer bg-light text-center text-lg-start">


  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">Made with &#10084;&#65039; by 
    <a class="text-dark" href="https://instagram.com/coding_monkeys">Coding Monkeys</a>
    </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

	<script>
		// function loadMatch(){
			setInterval(()=>{
				fetch('http://localhost/cricket/admin/api/api.php')
				.then(response=>{
					return response.json();
				}).then(data=>{
					for (var i = 0; i < data.length; i++) {
						document.getElementById('run').innerHTML=data[i].run;
						document.getElementById('team1').innerHTML=data[i].Team1;
						document.getElementById('team2').innerHTML=data[i].Team2;
						document.getElementById('wickets').innerHTML=data[i].wickets;
						document.getElementById('over').innerHTML=data[i].over;
						document.getElementById('balls').innerHTML=data[i].over_balls;
						document.getElementById('batting').innerHTML=data[i].batting;
						document.getElementById('logo1').src=data[i].logo1;
						document.getElementById('logo2').src=data[i].logo2;
						document.getElementById('fun_num').innerHTML=data[i].all;
						document.getElementById('extra').innerHTML=data[i].extraText;
					}
				})
			},100);

	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!--whatsApp-->	
<script>
    var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?87347';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
  "enabled":true,
  "chatButtonSetting":{
      "backgroundColor":"#4dc247",
      "ctaText":"",
      "borderRadius":"25",
      "marginLeft":"0",
      "marginBottom":"10",
      "marginRight":"10",
      "position":"right"
  },
  "brandSetting":{
      "brandName":"VCC",
      "brandSubTitle":"Typically replies within a minute",
      "brandImg":"https://scontent.frpr1-1.fna.fbcdn.net/v/t1.0-9/140044983_101192761971232_2368286955566542663_o.jpg?_nc_cat=111&ccb=2&_nc_sid=09cbfe&_nc_ohc=nIFELrWxUWAAX8xMN3J&_nc_ht=scontent.frpr1-1.fna&oh=81825cc1e172889272c58634d937ef8a&oe=602BE58A",
      "welcomeText":"Hi, there!\nHow can I help you?",
      "messageText":"Hello, I have a question about {{page_link}}",
      "backgroundColor":"#0a5f54",
      "ctaText":"Start Chat",
      "borderRadius":"25",
      "autoShow":false,
      "phoneNumber":"919171580878"
  }
};
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
</script>
	
</body>
</html>