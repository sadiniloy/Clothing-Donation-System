`<?php

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
        <script type="text/javascript">


function validateForm() {

    
    
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var oldpass = document.getElementById("oldpass").value;
    var php_var = "<?php echo"$pass"; ?>";


    if (oldpass != php_var) {
        alert("OLD Passwords Do not match");
       document.getElementById("oldpass").style.borderColor = "#E34234";
        //document.getElementById("pass2").style.borderColor = "#E34234";
        return false;
    }
    if (pass1 != pass2) {
        alert("Passwords Do not match");
       document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        return false;
    }
    

   
    
 };

</script>
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

		
     
		<div id="contents_area" >
        	
            
				
                    <h1>REGISTER!!!</h1>
                   <div id="reg">
                   <form name="myForm"  onsubmit="return validateForm()"  action="user_password_update.php" method="post" >
                       <ul>
                           
                            ID <li ><input type="text" value="<?php echo "$id"; ?>" name="id" readonly></li>
                            OLD Password<li><input type="password" name="password" id="oldpass" placeholder="password" 
                            ><br></li>

                            New Password<li><input type="password" name="password" id="pass1" placeholder="password"><br></li>
                            Confirm password<li><input type="password" name="password" id="pass2"  placeholder="password"><br></li>

                           

                            <input type="submit"  name="submit" value="update" "><br>                        

                       </ul>
                       </form>
                            


                       </ul>
                       </form>
                   </div>
                </div>
                
               
                        
			   
		</div>
	
		<footer id="footer">
			&copy;All Rights are reserved 2016.
		</footer>    
	
	</div> 
  </body>
</html>
        
    
    
    
       
