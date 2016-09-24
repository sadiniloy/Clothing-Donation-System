<?php

//session_start();
if(isset($_SESSION['searchid']))
 {
                                              
                               $searchid= $_SESSION['searchid'];
                                            //echo $searchid;
                                              
}
$db_connect = mysql_connect("localhost","root","") or die("unable to connect");

    mysql_select_db("cds",$db_connect) or die ("unable to select cds");



        $result=mysql_query("select * from users where id='$searchid' ")
		or die("failed to query ".mysql_error());
	
$row= mysql_fetch_array($result);
if($row['id']==$searchid  )
{ 
	$id= $row['id'];
	$first= $row['first'].
	$last=$row['last'];
	$dob= $row['dob'];
	$address= $row['address'];
	$gender= $row['gender'];
	$phone= $row['phone'];
	$email= $row['email'];
	$pass= $row['pass'];

}

else
echo "failed";
?>
<!DOCTYPE HTML>
<html >
	<head>
       
        <title>register</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <style type="text/css">
            
            #reg{
                padding:0px 0px 0px 50px;
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
                                 
                                  
                                  if(isset($sid)) // if sid  has any value then it will enter inside else dont
                                  {
                                  //echo $sid;
                                  }
                                  else // 
                                  {
                                 
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
                                  <li><a href="app.php"> Set Appoinment </a></li>
                                  <li><a href="user_profile.php"> User Profile </a></li>';
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
        	
            
				
                    <h1>REGISTER!!!</h1>
                   <div id="reg">
                   <form name="myForm" >
                       <ul>
                            User ID<li><br><?php echo $id;?></li>
                            First Name<li><br><?php echo $first;?></li>
                            Last Name<li><br><?php echo $last;?></li>
                            DOB<li><br><?php echo $dob;?></li>
                            Hourse Address<li><br><?php echo $address;?></li>
                            Gender<li><?php echo $gender;?></li>
                            Phone<li><br><?php echo $phone;?></li>
                            Email ID<li><br><?php echo $email;?></li>
                            



                       </ul>
                       </form>
                   </div>
                </div>
                
               
                        
			   
		</div>
	
		<footer id="footer">
			&copy;All Rights are reserved 2016.
		</footer>    
	
	</div> 
</html>
        
    
    
    
       
