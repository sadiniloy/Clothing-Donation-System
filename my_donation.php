

<!DOCTYPE HTML>
<html >
	<head>
       
        <title>register</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <style type="text/css">
            
            #reg{
                padding:0px 0px 0px 50px;
            }
            table td{
                width:320px;
                padding:5px;
                border:1px solid;
                text-align:center;
                
            }
            
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
                                  echo '<li><a href="index.php"> Home </a></li>
                                  <li><a href="about_us.php"> About Us</a></li>
                                  <li><a href="contact_us.php"> Contact Us </a></li>
                                  
                                  <li><a href="dashboard_for_donor.php"> Dashboard </a></li>';
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

		
     
		<div id="contents_area" >
        	
            
				
                    <h1>MY DONATIONS</h1>
                   <div id="reg">
                   <form name="myForm"  onsubmit="return validateForm()"  action="register.php" method="post" >
                       <ul>
                           <?php

//session_start();
$sid = $_SESSION['varname'];
mysql_connect("localhost","root","");
mysql_select_db("cds");
//echo $sid;



$result=mysql_query("select * from inventory where user_id='$sid' and status='done'") 
or die("failed to query from inventory".mysql_error());

$shirt=0;
$pant=0;
$jacket=0;
$blanket=0;
while ($row = mysql_fetch_assoc($result)){
    $shirt = $shirt+$row['shirt'];
    $pant =$pant+ $row['pant'];
    $jacket =  $jacket+$row['jacket'];
    $blanket = $blanket+$row['blanket'];
    
}
echo "done!!".'<br>';
echo "<table>";
echo "<tr><td>total number of shirt</td><td>".$shirt.'</td></tr>'.
  "<tr><td>total number of pant</td><td>".$pant.'</td></tr>'.
  "<tr><td>total number of jacket</td><td>".$jacket.'</td></tr>'.
  "<tr><td>total number of blanket</td><td>".$blanket.'</td></tr>';
echo "</table>";
  $result1=mysql_query("select * from inventory where user_id='$sid' and status='pending'") 
or die("failed to query from inventory".mysql_error());

$shirt1=0;
$pant1=0;
$jacket1=0;
$blanket1=0;
while ($row = mysql_fetch_assoc($result1)){
    $shirt1 = $shirt1+$row['shirt'];
    $pant1 =$pant1+ $row['pant'];
    $jacket1 =  $jacket1+$row['jacket'];
    $blanket1 = $blanket1+$row['blanket'];
    
}
echo "pending".'<br>';
echo "<table>";
echo "<tr><td>total number of shirt</td><td>".$shirt1.'</td></tr>'.
  "<tr><td>total number of pant</td><td>".$pant1.'</td></tr>'.
  "<tr><td>total number of jacket</td><td>".$jacket1.'</td></tr>'.
  "<tr><td>total number of blanket</td><td>".$blanket1.'</td></tr>';
echo "</table>";


	
	
	
	


?>
                            
                            


                       </ul>
                       </form>
                   </div>
                </div>
                
               
        <footer id="footer">
          &copy;All Rights are reserved 2016.
        </footer>                     
			   
		</div>
	
  </body> 
</html>
        
    
    
    
       
