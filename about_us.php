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
                   <P STYLE="margin-bottom: 0.14in"><A NAME="_GoBack"></A><FONT SIZE=3>Every
						year in our country lots of people die because of </FONT><FONT SIZE=3>winter
						fury. Usually we start collecting </FONT><FONT SIZE=4>warm clothes
						when winter comes.</FONT><FONT SIZE=3> The collection process takes a
						long time and eventually when we start distributing clothes winter is
						about to end. Unfortunately, may people have died by this time
						because of coldness.<BR><BR>Our plan is to collect clothes throughout
						the whole year. As a result, there will be no late to distribute
						clothes among the needy people and by this we can save more thousand
						of lives.<BR><BR>With this website, a </FONT><FONT SIZE=3><B>DONOR</B>
					</FONT><FONT SIZE=3>
						can donate</FONT><FONT SIZE=3>  </FONT><FONT SIZE=4><B>SHIRTS, PANTS,
						JACKETS, BLANKETS </B></FONT><FONT SIZE=3>as many as he/she wants. In
						future we have plan to add some more donation criteria.</FONT></P>
						<P STYLE="margin-bottom: 0.14in"><FONT SIZE=3>Do not you want to be
						a part of this generous effort? If yes, Why waiting?<BR><BR>Just </FONT><FONT SIZE=4><B>
						REGISTER</B></FONT><FONT SIZE=3>
						today by yourself and become a helping hand.<BR><BR></FONT><BR><BR>
					</P>
								   
				</div>
					
							
							
							
               </div>
                
				
				
		</div>
				<footer id="footer">
			&copy; All Rights are reserved 2016.
		</footer>  
	  
		    
	
	</div> 
 
		</body>
</html> 
         
        
    
    
    
       
