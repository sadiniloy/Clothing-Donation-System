<!DOCTYPE HTML>
<html >
	<head>
       
        <title>login</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <style type="text/css">

        </style>
        <script type="text/javascript">
        	function validateForm() {

	if(document.getElementById("email").value==null||document.getElementById("email").value==""||document.getElementById("pass").value==null||document.getElementById("pass").value==""){
		alert("field empty");
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
						<li><a href="index.php"> Home </a></li>
                        <li><a href="login.php"> Already A Donor? </a></li>                             
                        <li><a href="about_us.php"> About Us</a></li>
                        <li><a href="register.php"> Become A Donor </a></li> 
                        <li><a href="contact_us.php"> Contact Us </a></li>
					</ul>
				</nav>
			</div>
		</header>	

		
     
		<div id="contents_area">

            
				<h1>Login </h1>
                <form name="myForm" onsubmit="return validateForm()"  action="loginprocess.php" method="post"  >
<pre>

    Email           <input type="text" name="email" id="email" ><br>

    
    Password        <input type="password" name="pass" id="pass" ><br>
        
                        <input type="submit"  value="Login" ><br>

        
    
</pre>
</form>
            
		</div>
	
		<footer id="footer">
			&copy; All Rights are reserved 2016.
		</footer>    
	
	</div> 
	</body>
</html>
        
    
    
    
       
