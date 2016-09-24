<?php

session_start();
$sid = $_SESSION['varname'];
mysql_connect("localhost","root","");
mysql_select_db("cds");

$result=mysql_query("select * from users where id='$sid' ")
		or die("failed to query ".mysql_error());
	
$row= mysql_fetch_array($result);
if($row['id']==$sid  )
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
	$imgpath= $row['imgpath'];
  $role=$row['role'];
}

else
echo "failed";
?>
<!DOCTYPE HTML>
<html >
	<head>
       
        <title>Basic Information</title>
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

                                  if($role=='admin')
                                  {
                                    echo '<li><a href="index.php"> Home </a></li>
                                  <li><a href="about_us.php"> About Us</a></li>
                                  <li><a href="contact_us.php"> Contact Us </a></li>
                                  <li><a href="dashboard.php"> Dashboard</a></li>';

                                  }


                                  else if($role=='moderator')
                                  {
                                    echo '<li><a href="index.php"> Home </a></li>
                                  <li><a href="about_us.php"> About Us</a></li>
                                  <li><a href="contact_us.php"> Contact Us </a></li>
                                  <li><a href="dashboard_for_mod.php"> Dashboard</a></li>';

                                  }
                                  else if($role=='donor')

                                  echo '<li><a href="index.php"> Home </a></li>
                                  <li><a href="about_us.php"> About Us</a></li>
                                  <li><a href="contact_us.php"> Contact Us </a></li>
                                  
                                  <li><a href="dashboard_for_donor.php"> Dashboard </a></li>';;
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
        	
            
				
                    <h1>Basic Information</h1>
                   <div id="reg">
                   
                     
                            Photo<br><?php echo"<img src= '$imgpath' height= '200' width= '150'/>"?>
                            <table>
                              <thead>
                                
                              </thead>
                              <tbody>
                                
                                
                                   <tr>
                                   <td>User ID</td>
                                   <td><?php echo $id;?></td>
                                   </tr>
                                   

                                   <tr>
                                   <td>Role</td>
                                   <td><?php echo $role;?></td>
                                   </tr>
                                   

                                   <tr>
                                   <td>Name</td>
                                   <td><?php echo $first ?></td>
                                   </tr>
                                   
                                   <tr>
                                   <td>DOB</td>
                                   <td><?php echo $dob;?></td>
                                   </tr>
                                   

                                   <tr>
                                  <td>Hourse Address  </td>
                                   <td><?php echo $address;?></td></tr>
                                   

                                   <tr>
                                   <td>Gender</td>
                                  <td> <?php echo $gender;?></td>
                                  </tr>
                                   
                                   

                                   <tr>
                                   <td>Phone</td>
                                   <td><?php echo $phone;?></td>
                                   </tr>


                                   <tr>
                                   <td>Email ID</td>
                                   <td><?php echo $email;?></td>
                                   </tr>
                                   
                                   <tr>
                                   <td>Password</td>
                                   <td><?php echo $pass;?></td>
                                   </tr>
                                
                              </tbody>

                            </table>
                           
                            <button><a href="user_password_change.php"> Update Password</a></button>
                            <button><a href="user_info_change.php"> Update Information</a></button>
                            
                            


                       
                       
                   </div>
                </div>
                
               
                  <footer id="footer">
                    &copy;All Rights are reserved 2016.
                  </footer>           
			   
		</div>
  </body>
</html>
        
    
    
    
       
