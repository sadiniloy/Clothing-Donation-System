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
  $role= $row['role'];
  $first= $row['first'];
  $last=$row['last'];
  $dob= $row['dob'];
  $address= $row['address'];
  $district= $row['district'];
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

  if(document.getElementById("firstnameid").value==null||document.getElementById("firstnameid").value==""||document.getElementById("lastnameid").value==null||document.getElementById("lastnameid").value==""||document.getElementById("phone").value==null||document.getElementById("phone").value==""||
        document.getElementById("dobid").value==null||document.getElementById("dobid").value==""||
        document.getElementById("addressid").value==null||document.getElementById("addressid").value==""){
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

            ?>
                    </ul>
        </nav>
      </div>
    </header> 

    
     
    <div id="contents_area" >
          
            
        
                    <h1>REGISTER!!!</h1>
                   <div id="reg">
                   <form name="myForm"  onsubmit="return validateForm()"  action="user_info_update.php" method="post" >
                       <ul>
                           ID<li ><input type="text" id="id" value="<?php echo "$id"; ?>" name="id" readonly></li>
                            Role<li ><input type="text" id="role" value="<?php echo "$role"; ?>" name="role" readonly></li>
                            First Name<li ><input type="text" id="firstnameid" value="<?php echo "$first"; ?>" name="first" ></li>
                            Last Name<li ><input type="text" id="lastnameid" value="<?php echo "$last"; ?>" name="last" ></li>
                            Email<li ><input type="text" id="email" value="<?php echo "$email"; ?>" name="email" ></li>
                            Phone<li ><input type="text" id="phone" value="<?php echo "$phone"; ?>" name="phone" ></li>
                            Address<li ><input type="text" value="<?php echo "$address"; ?>" name="address" id="addressid" ></li>
                          Date of Birth<li ><input type="date" value="<?php echo "$dob"; ?>" name="dob" id="dobid"></li>
                            <li>District:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp 
                            <select name='district'>
                            <?php 
                                if($district=="dhaka")
                                {
                                  echo "<option value='dhaka' selected>dhaka</option>";
                                  echo "<option value='khulna' >khulna</option>";
                                  echo "<option value='chittagong' >chittagong</option>"; 

                                }
                                else if($district=="khulna")
                                {
                                  echo "<option value='khulna' selected>khulna</option>";
                                   echo "<option value='dhaka' >dhaka</option>";
                                   echo "<option value='chittagong' >chittagong</option>";
                                }
                                else
                                {
                                  echo "<option value='chittagong' selected>chittagong</option>";
                                   echo "<option value='dhaka' >dhaka</option>";
                                  echo "<option value='khulna' >khulna</option>";

                                }

                            ?>
                            
                            
                              
                             
                            </select><br></li>

                           

                            <input type="submit"  name="submit" value="update" "><br>                        

                       </ul>
                       </form>
                            


                       </ul>
                       </form>
                   </div>
                </div>
                
               
                        
         
    
  
    <footer id="footer">
      &copy;All Rights are reserved 2016.
    </footer>    
  
  </div>  
  </div>
  </body>
</html>
        
    
    
    
       
