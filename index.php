<!DOCTYPE HTML>
<html>
	<head>
       
        <title>Home</title>

        <link type="text/css" rel="stylesheet" href="css/style.css">
        <style type="text/css">
            #contents_area img{
                width:1000px;
            }
            .mySlides {display:none;}
            
        </style>
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
		                                  echo '<a href="logout.php"><button >log out</button></a>';

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
										else  // for admin
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
        	<img class="mySlides" src="files/icon/bg.jpg" alt="Background"> 
        	<img class="mySlides" src="files/icon/bg2.jpg" alt="Background">
        	<img class="mySlides" src="files/icon/bg3.jpg" alt="Background">
        	<img class="mySlides" src="files/icon/bg4.jpg" alt="Background">     	
		</div>
		<script>
			var myIndex = 0;
			carousel();
			function carousel() {
			var i;
			var x = document.getElementsByClassName("mySlides");
			for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
			}
			myIndex++;
			if (myIndex > x.length) {myIndex = 1}
			x[myIndex-1].style.display = "block";
			setTimeout(carousel, 2500); // Change image every 2.5 seconds
			}
		</script>
	
		<footer id="footer">
			&copy; All Rights are reserved 2016.
		</footer>    
	
	</div>
		</body>
</html> 
         
        
    
    
    
       
