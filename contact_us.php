<!DOCTYPE HTML>
<html >
	<head>
        
         <title>Contact us</title>
        
        <link type="text/css" rel="stylesheet" href="css/style.css">
    </head> 

	
	<body>
    	<div id="wrapper">
    	<header id="header">
			<div id="header_area">
				<div id="logo"><img src="files/icon/logo.png" alt="Logo"></div>
				<div id="session" align="right">
				<?php 
						if(!isset($_SESSION))
                           {
                                  session_start();

		                                  if(isset($_SESSION['varname']))
		                                  {
		                                  $sid = $_SESSION['varname'];
		                                  echo $sid;
		                                  echo '<a href="logout.php"><button>log out</button></a>';

		                                  }
		                                  else
		                                  {
		                                  	echo "not logged in";
		                                  }
                            }
                            else
                            {
								if(isset($sid)) // if sid  has any value then it will enter inside else dont
                                  {
                                  //$sid = $_SESSION['varname'];
		                                  echo $sid;
		                                  echo '<a href="logout.php"><button>log out</button></a>';
                                  }
                                  else // 
                                  {
                                 echo "not logged in";
                                  }
                            }
                                  
                                  

					?>
					</div>
                
			</div>

			<div id="menu_area">
				<nav id="menu">
					<ul>
						<?php 

					
							if(isset($sid)) // if sid  has any value then it will enter inside else dont
                                 {
		                                  //session_start();
		                                 		mysql_connect("localhost","root","");
												mysql_select_db("cds");

										$result=mysql_query("select * from users where id ='$sid'")
										or die("failed to query ".mysql_error());
										$row= mysql_fetch_array($result);
										if($row['role']=='donor')  // for donor
										{
											 echo '<li><a href="index.php"> Home </a></li>
				                                  <li><a href="about_us.php"> About Us</a></li>
				                                  <li><a href="contact_us.php"> Contact Us </a></li>
				                                   <li><a href="dashboard_for_donor.php"> Dashboard </a></li>';

										}
										else if ($row['role']=='moderator' ) // for mod
										{ 
											 

				                                   echo '<li><a href="index.php"> Home </a></li>
				                                  <li><a href="about_us.php"> About Us</a></li>
				                                  <li><a href="contact_us.php"> Contact Us </a></li>
				                                   <li><a href="dashboard_for_mod.php"> Dashboard </a></li>';
				                                   


										}
										else if ($row['role']=='admin' ) // for admin
										{ 
											 
  
				                                   echo '<li><a href="index.php"> Home </a></li>
				                                  <li><a href="about_us.php"> About Us</a></li>
				                                  <li><a href="contact_us.php"> Contact Us </a></li>
				                                 
				                                  	<li><a href="dashboard.php"> Dashboard </a></li>';
				                                   
				                                  
				                                   


										}
										

		                                 
                             }
                                  else
                                  {
                                  	echo '<li><a href="index.php"> Home </a></li>
						
                        <li><a href="login.php"> Already A Donor? </a></li>                             
                        <li><a href="about_us.php"> About Us</a></li>
                        <li><a href="register.php"> Become A Donor </a></li> 
                        <li><a href="contact_us.php"> Contact Us </a></li>';

                                  }

						?>
					</ul>
				</nav>
			</div>
		</header>		
     
		<div id="contents_area">
        	<div id="main_contents">
				
               <div id="contents">
                    
					<h1>Contact Us</h1>
							Email: charity123@yahoo.com<br>
							Phone Number: +8801620853872<br>
							Location: 24b, Badda, Dhaka 1234 <br>
		 
							<br><p>Help us help others.</p><br>
							
					
					
					
					
					<div id="map">
						<script>
						  var map;
						  function initMap() {
							var myLatLng = {lat: 23.773787, lng: 90.425944};

					  var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 18,
						center: myLatLng
					  });

					  var marker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						title: 'Hello World!'
					  });

						  }
						</script>
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp1obgsazNP8YAZvCfQ85YAi9zxKD1zAI&callback=initMap"
						async defer></script>
								   
				</div>
					
							
							
							
               </div>
                
				
				
		</div>
	  
		    
	
	</div> 
</div>
	  
		    
	
	</div> 
     
		
	
		<footer id="footer">
			&copy; All Rights are reserved 2016.
		</footer>    
	
	</div>
		</body>
</html> 
        
    
    
    
       
