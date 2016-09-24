
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

    if(document.getElementById("firstnameid").value==null||document.getElementById("firstnameid").value==""||document.getElementById("lastnameid").value==null||document.getElementById("lastnameid").value==""||document.getElementById("phone").value==null||document.getElementById("phone").value==""||
        document.getElementById("pass1").value==null||document.getElementById("pass1").value==""||
        document.getElementById("pass2").value==null||document.getElementById("pass2").value==""||
        document.getElementById("dobid").value==null||document.getElementById("dobid").value==""
        ){
        alert("field empty");
    return false;
    }

   var x = document.forms["myForm"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
    
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    if (pass1 != pass2) {
        alert("Passwords Do not match");
       // document.getElementById("pass1").style.borderColor = "#E34234";
        //document.getElementById("pass2").style.borderColor = "#E34234";
        return false;
    }
    var val = document.getElementById("phone").value;
    if (/^\d{11}$/.test(val)) {
                //ok
    } 
    else 
    {
            alert("Invalid number; must be eleven digits")
         
            return false
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
                        <li><a href="about_us.php"> About Us</a></li>
                        <li><a href="contact_us.php"> Contact Us </a></li>
                        <li><a href="dashboard.php"> Dashboard</a></li>
				</nav>
			</div>
		</header>	

        

		
     
		<div id="contents_area" >
        	
            
				
                    <h1>Add Moderator!!!</h1>
                   <div id="reg">
                   <form name="myForm"  onsubmit="return validateForm()"  action="addmod_process.php" method="post" attribute enctype="multipart/form-data">
                       <ul>
                         <pre>
Image Upload          <input type="file" name="file_img" id="fileChooser" accept =".jpg, .jpeg, .png"/><br>
First Name            <input type="text" name="FirstName" id="firstnameid" placeholder="First Name" ><br>
Last Name             <input type="text" name ="LastName" id="lastnameid" placeholder="Last Name"><br>
DOB                   <input type="date" name="DOB" id="dobid"><br>
Hourse Address<li><textarea rows="4" cols="50" name="houseaddress" id="houseaddressid"></textarea><br></li>
District:             <select name='district'>
                      <option value="dhaka">dhaka</option>
                      <option value="khulna">khulnna</option>
                      <option value="chittagong">chittagong</option>
                      </select><br>
Gender                <input type="radio" name="Gender" value="male" checked> Male   <input type="radio" name="Gender" value="female" > Female<br>
Phone                 <input type="text" name="Phone" id="phone" placeholder="Phone"><br>
Email ID              <input type="text" name="email" id="emailid" placeholder="Email ID"><br>
Password              <input type="password" name="password"id="pass1" placeholder="password"><br>
Confirm password      <input type="password" id="pass2"  placeholder="password"><br>
                      <input type="submit"  name="submit" value="Submit"><br>
                          </pre>
                       </ul>
                       </form>
                   </div>
                </div>
                
               
                        
			 <footer id="footer">
      &copy;All Rights are reserved 2016.
    </footer>    
		</div>
	
		  
	
	
</html>
        
    
    
    
       
