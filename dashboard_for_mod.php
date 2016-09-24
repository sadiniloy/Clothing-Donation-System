<!DOCTYPE HTML>
<html >
    <head>
        
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <style type="text/css">
            table td{
                width:350px;
                padding:5px;
                border:1px solid;
                text-align:center;
                border: none;
            }
            

           .myButton {
    -moz-box-shadow: 0px 10px 14px -7px #b3b353;
    -webkit-box-shadow: 0px 10px 14px -7px #b3b353;
    box-shadow: 0px 10px 14px -7px #b3b353;
    background-color:#fdfdc1;
    -moz-border-radius:8px;
    -webkit-border-radius:8px;
    border-radius:8px;
    display:inline-block;
    cursor:pointer;
    color:#b3b353;
    font-family:Arial;
    font-size:20px;
    padding:14px 76px;
    text-decoration:none;
    text-shadow:0px 1px 0px #b3b353;
}
.myButton:hover {
    background-color:#fdfdc1;
}
.myButton:active {
    position:relative;
    top:1px;
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
                        <li><a href="index.php"> Home </a></li>
                                        
                        <li><a href="about_us.php"> About Us</a></li>
                       
                        <li><a href="contact_us.php"> Contact Us </a></li>
                        <li><a href="dashboard_for_mod.php"> Dashboard </a></li>
                    </ul>
                </nav>
            </div>
        </header>   

        
     
        <div id="contents_area">
            
            <div id="main_contents">
               
                <table >
                    <tr>
                        <td>
                            <a href="donorlist.php" class="myButton">Donor List</a>
                        </td>
                        <td>
                            <a href="donationdetails.php" class="myButton">Donation Details</a>
                        </td>
                       
                    </tr>
                    <tr>
                        <td>
                             <a href="user_profile.php" class="myButton">User Profile</a>
                        </td>
                        
                      
                            
                        
                    </tr>
                    
                    
                   
                </table>
            </div>
        </div><!--end contant_area-->
    
        <footer id="footer">
            &copy; All Rights are reserved 2016.
        </footer>    
    
    </div> <!--End wrapper-->
    </body>
</html>
        
    
    
    
       
