
<!DOCTYPE HTML>
<html >
    <head>
        
        <title>appointment</title>
        
        <link type="text/css" rel="stylesheet" href="css/style.css">


        <style type="text/css">
            #app{
                padding:0px 0px 0px 50px;
            }
            
            
        </style>
        <script type="text/javascript">
          function validateForm() {

            if(document.getElementById("app_date").value==null||document.getElementById("app_date").value=="")
            {
              alert("field empty");
                return false;
          }


            var inputdDate = document.getElementById("app_date").value;
            
            if(new Date(inputdDate).getTime() < new Date().getTime()){
              alert("Please Select a valid date");
              return false;

            }
          }
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
                                        echo "not loggggged in";
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
                                  {   //session_start();
                                    $sid = $_SESSION['varname'];
                                      echo $sid;
                                      echo '<a href="logout.php"><button>log out</button></a>';
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
                        <li><a href="dashboard_for_donor.php"> Dashborad </a></li>
            </div>
        </header>   

        
     
        <div id="contents_area" >
            
            
                
               <div id="contents">

                    <h1>Set Appoinment</h1>
                      <UL>
                        <LI><P STYLE="margin-bottom: 0.14in"><FONT SIZE=2>Please select
                        number of </FONT><FONT SIZE=2><B>SHIRTS/PANTS/JACKETS/BLANKETS</B></FONT><FONT SIZE=2>
                        you want to donate.</FONT></P>
                        <LI><P STYLE="margin-bottom: 0.14in"><FONT SIZE=2>Then select </FONT><FONT SIZE=2><B>an
                        appointment date</B></FONT><FONT SIZE=2> with your </FONT><FONT SIZE=2><B>MODERATOR</B></FONT><FONT SIZE=2>
                        for your donation.</FONT></P>
                        <LI><P STYLE="margin-bottom: 0.14in"><A NAME="_GoBack"></A><FONT SIZE=2>For
                        any inconvenience you can also contact your </FONT><FONT SIZE=2><B>MODERATOR</B></FONT><FONT SIZE=2>
                        
                        </P>
                    </UL>

                    <?php 

                                                    //session_start();
                      $sid = $_SESSION['varname'];
                      mysql_connect("localhost","root","");
                      mysql_select_db("cds");

                      $one=mysql_query("select * from users where id='$sid'")
                              or die("failed to query from users".mysql_error());
                              
                              $rowone= mysql_fetch_array($one);
                              $modid=$rowone['id'];
                              $moddis=$rowone['district'];
                             //echo "area : " .$moddis.'</br>';

                          $two=mysql_query("select * from users where district='$moddis' and role='moderator'")
                              or die("failed to query from users ".mysql_error());
                             
                                $rowtwo= mysql_fetch_array($two);
                                echo "MODERATOR Email :".$rowtwo['email']."</br>";
                                echo "MODERATOR Name :".$rowtwo['first']." ".$rowtwo['last']."</br>";
                                echo "MODERATOR Phone :".$rowtwo['phone']."</br>";

                      ?>



                   <div id="app">
                   <form name="appform" onsubmit="return validateForm()" action="app_process.php" method="post" >
                       <ul>
                            
                            <li>Shirt:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    
                            <select name="shirt">
                            <option value=0>0</option>
                              <option value=1>1</option>
                              <option value=2>2</option>
                              <option value=3>3</option>
                              <option value=4>4</option>
                              <option value=5>5</option>
                              <option value=6>6</option>
                              <option value=7>7</option>
                              <option value=8>8</option>
                              <option value=9>9</option>
                              <option value=10>10</option>
                            </select><br></li>

                            <li>Pants:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp 
                            <select name="pant">
                            <option value=0>0</option>
                              <option value=1>1</option>
                              <option value=2>2</option>
                              <option value=3>3</option>
                              <option value=4>4</option>
                              <option value=5>5</option>
                              <option value=6>6</option>
                              <option value=7>7</option>
                              <option value=8>8</option>
                              <option value=9>9</option>
                              <option value=10>10</option>
                            </select><br></li>

                            <li>Jacket:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp 
                            <select name="jacket">
                            <option value=0>0</option>
                              <option value=1>1</option>
                              <option value=2>2</option>
                              <option value=3>3</option>
                              <option value=4>4</option>
                              <option value=5>5</option>
                              <option value=6>6</option>
                              <option value=7>7</option>
                              <option value=8>8</option>
                              <option value=9>9</option>
                              <option value=10>10</option>
                            </select><br></li>

                            <li>Blanket:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp 
                            <select name ="blanket">
                            <option value=0>0</option>
                              <option value=1>1</option>
                              <option value=2>2</option>
                              <option value=3>3</option>
                              <option value=4>4</option>
                              <option value=5>5</option>
                              <option value=6>6</option>
                              <option value=7>7</option>
                              <option value=8>8</option>
                              <option value=9>9</option>
                              <option value=10>10</option>
                            </select><br></li>

                            <li>Appointment Date:
                            
                                <input type="date" name="appdate" id="app_date"><br>
                           </li>

                           


                             <input type="submit"  name="submit" value="Submit" "><br>
                       </ul>
                       </form>
                   </div>
                </div>
                
               
                        
               
        </div>

        
        <footer id="footer">
            &copy;All Rights are reserved 2016.
        </footer>    
    
    </div> <!--End wrapper-->
    </body>
</html>
        
    
    
    
       
